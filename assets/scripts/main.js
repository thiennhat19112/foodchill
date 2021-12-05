/*  ---------------------------------------------------
    Template Name: Ogani
    Description:  Ogani eCommerce  HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloader").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.featured__controls li').on('click', function () {
            $('.featured__controls li').removeClass('active');
            $(this).addClass('active');
        });

        if ($('.featured__filter').length > 0) {
            var containerEl = document.querySelector('.featured__filter');
            var mixer = mixitup(containerEl);
        }
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".humberger__open").on('click', function () {
        $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".humberger__menu__overlay").on('click', function () {
        $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });

    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*-----------------------
        Categories Slider
    ------------------------*/
    $(".categories__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            0: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });


    $('.hero__categories__all').on('click', function () {
        $('.hero__categories ul').slideToggle(400);
    });

    /*--------------------------
        Latest Product Slider
    ----------------------------*/
    $(".latest-product__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*-----------------------------
        Product Discount Slider
    -------------------------------*/
    $(".product__discount__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 3,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 2,
            },

            992: {
                items: 3,
            }
        }
    });

    /*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
    $(".product__details__pic__slider").owlCarousel({
        loop: true,
        margin: 20,
        items: 4,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*--------------------------
        Select
    ----------------------------*/
    $("select#sort_option").niceSelect();

    /*------------------
        Single Product
    --------------------*/
    $('.product__details__pic__slider img').on('click', function () {
        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product__details__pic__item--large').attr('src');
        if (imgurl != bigImg) {
            $('.product__details__pic__item--large').attr({
                src: imgurl
            });
        }
    });

    /*-------------------
        Change Quantity
    ---------------------*/
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        var minValue = $button.parent().find('input').attr("min");
        var maxValue = $button.parent().find('input').attr("max");
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
            if (newVal >= maxValue) { newVal = maxValue; }
        } else {
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }   // Don't allow decrementing below one
        }
        $button.parent().find('input').val(newVal);

        /*------------------
            Change Price
        --------------------*/
        var id = $(this).parent().find('input').attr('id');
        if (id != 'add_qty') {
            var user_id = id.split("_")[0];
            var prod_id = id.split("_")[1];
            var new_qty = $("#" + id).val();
            $.ajax({
                url: "./models/ajax.php",
                method: "POST",
                data: {
                    "changeQtyProd": prod_id,
                    "user_id": user_id,
                    "qty": new_qty,
                },
                success: function (result) {
                    var data = $.parseJSON(result);
                    $("#itemPrice_" + user_id + "_" + prod_id).html(data[0]);
                    $("#cart-tongtienhang").html(data[1]);
                    $("#cart-thanhtien").html(data[2]);
                }
            });
        }
    });
})(jQuery);

$(document).ready(function () {

    if ($('#thisIsShop').val() == 1) {
        filter_data();
    }
    /*------------------
        Sort Product
    --------------------*/
    function filter_data() {
        $('.sort--prod').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var min_price = $('#hidden_minimum_price').val();
        var max_price = $('#hidden_maximum_price').val();
        var category = get_filter('category');
        var sort = get_sort();
        var page = $("#page_number").val();
        var page_active = $("#page_number_active").val();
        $.ajax({
            url: "./models/ajax.php",
            method: "POST",
            data: { "action": action, "min_price": min_price, "max_price": max_price, "category": category, "sort": sort, "page": page, "page_active": page_active },
            success: function (result) {
                var jsonResult = $.parseJSON(result);
                var data1 = jsonResult[0];
                var data2 = jsonResult[1];
                var data3 = jsonResult[3];
                $('#foundedProd').html(data2);
                $('.sort--prod').html(data1);
                $('.set-bg').each(function () {
                    var bg = $(this).data('setbg');
                    $(this).css('background-image', 'url(' + bg + ')');
                });

                $('#sort--page').html(data3);
            }
        });
    }

    /*---------------------
        Get filter value
    -----------------------*/
    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function () {
            filter.push($(this).val());
        });
        return filter;
    }
    function get_sort() {
        return $("#sort_option option:selected").val();
    }

    /*------------------
        Start Sort
    --------------------*/
    $('#sort_option').change(function () {
        filter_data();
    });
    $('.common_selector').click(function () {
        filter_data();
    });

    /*------------------
        Price Slider
    --------------------*/
    var minPrice = $(".price-range").data('min'),
        maxPrice = $(".price-range").data('max');
    $(".price-range").slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        step: 1000,
        slide: function (event, ui) {
            $('.range-slider').html('<span id="minimum_price">' + ui.values[0] + '</span>₫ - <span id="maximum_price">' + ui.values[1] + '</span>₫');
        },
        stop: function (event, ui) {
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });
});

$(document).ready(function () {

    // Search
    $("#searchInput").keyup(function () {
        var search = $(this).val();
        if (search != '') {
            $.ajax({
                url: "./models/ajax.php",
                method: "POST",
                data: { "search": search },
                success: function (result) {
                    $("#searchOut").attr('style', 'display: block');
                    $("#searchOut").html(result);
                }
            });
        } else {
            $("#searchOut").attr('style', 'display: none');
        }
    });

    // For each Product item
    $("button.favorite").click(function () {
        var prod_id = $(this).val();
        var u_id = $("#user_id").val();
        if (u_id == "0") {
            swal({
                title: "Vui lòng đăng nhập để sử dụng chức năng này!",
                icon: "warning",
                button: "Đóng",
            })
        } else {
            $(this).toggleClass("liked"); // Change color
            $.ajax({
                url: "./models/ajax.php",
                method: "POST",
                data: {
                    "favorite": prod_id,
                    "user_id": u_id,
                },
                success: function (data) {
                    $("#showUserLike").html(data);
                }
            });
        }
    }); // Add to Favorite, Not for shop

    $("button.addToCart").click(function () {
        var prod_id = $(this).val();
        var u_id = $("#user_id").val();
        var qty = $("#add_qty").val();
        if (u_id == "0") {
            swal({
                title: "Vui lòng đăng nhập để sử dụng chức năng này!",
                icon: "warning",
                button: "Đóng",
            })
        } else {
            $.ajax({
                url: "./models/ajax.php",
                method: "POST",
                data: {
                    "addToCart": prod_id,
                    "user_id": u_id,
                    "qty": qty,
                },
                success: function (data) {
                    $("#showUserCart").html(data);
                }
            });
        }
    }); // Add to Cart, Not for shop

    // For Ship
    setInterval(reload_table_shipper, 1000);
    function reload_table_shipper() {
        $('.shipping-table').load('ship/reload_table.php', function () {
            //cập nhật trạng thái đơn hàng và thời gian shipper
            $("#shipping").click(function () {
                var id = $(this).data('order-id');
                $.ajax({
                    url: "models/ship.php",
                    type: "POST",
                    data: {
                        'id': id
                    },
                });
            });
        });
    };  // Tải lại bảng hóa đơn cho Shipper

    // For Cart
    $("table.cart-table button.delete_item_cart").click(function () {
        var p_id = $(this).val();
        var tthang = $("#hidden-tongtienhang").val();
        var ttien = $("#hidden-thanhtien").val();
        $(this).parent().parent().fadeOut();
        $.ajax({
            url: "./models/ajax.php",
            method: "POST",
            data: { "product_cart_remove": p_id, "tongtienhang": tthang, "thanhtien": ttien },
            success: function (result) {
                var data = $.parseJSON(result);
                $("#showUserCart").html(data[0]);
                $("#cart-tongtienhang").html(data[1]);
                $("#cart-thanhtien").html(data[2]);
                swal({
                    title: "Đã xoá sản phẩm khỏi giỏ hàng!",
                    icon: "success",
                    button: "Đóng",
                });
            }
        });
    }); // Xóa sản phẩm trong giỏ hàng

    $(".input-prod-qty").change(function () {
        var maxQty = $(this).attr('max');
        if ($(this).val() <= 0 || $(this).val() == "") {
            $(this).val(1);
        } else if ($(this).val() > parseInt(maxQty)) {
            $(this).val(maxQty);
            swal({
                title: "Chỉ còn " + maxQty + " sản phẩm này!",
                icon: "warning",
                button: "Đóng",
            });
        }
        var input_id = $(this).attr('id');
        changeQtyProdInCart(input_id);
    }); // Thay đổi số lượng sản phẩm trong giỏ hàng

    function changeQtyProdInCart(id) {
        if (id != 'add_qty') {
            var user_id = id.split("_")[0];
            var prod_id = id.split("_")[1];
            var new_qty = $("#" + id).val();
            $.ajax({
                url: "./models/ajax.php",
                method: "POST",
                data: {
                    "changeQtyProd": prod_id,
                    "user_id": user_id,
                    "qty": new_qty,
                },
                success: function (result) {
                    var data = $.parseJSON(result);
                    $("#itemPrice_" + user_id + "_" + prod_id).html(data[0]);
                    $("#cart-tongtienhang").html(data[1]);
                    $("#cart-thanhtien").html(data[2]);
                }
            });
        }
    }   // For upper function

    // For Comments
    $(".cmtBtn").click(function () {
        var id = this.id;   //Get button id with format: accId_cmtAjax_postId
        $("#" + this.id).prop('disabled', true);  //Disable Send button
        var u_id = $("#user_id").val();    //Get user_id
        var p_id = id.split("_")[1];    //Get postId
        var newCmt = $("[name='cmt_" + p_id + "']").serialize();   //Get content of comment from input
        var cmt = decodeURIComponent(newCmt.split("=")[1]);
        var textNumCmt = $("#cmts_" + p_id).text(); //Get Count Comments
        var numCmt = parseInt(textNumCmt.split(" ")[0]) + 1;  //new Count Comments
        if ($("#cmtOf_" + p_id).hasClass("cmt-hide")) {
            $("#cmtOf_" + p_id).removeClass("cmt-hide")
        } //Show All Comments
        console.log(u_id, p_id, cmt);
        if (u_id == "0") {
            swal({
                title: "Vui lòng đăng nhập để sử dụng chức năng này!",
                icon: "warning",
                button: "Đóng",
            })
        } else {
            $.ajax({
                type: "post",
                url: "./models/ajax.php",
                data: {
                    'new_cmt_prod': p_id,
                    'u_id': u_id,
                    'content': cmt,
                },
                success: function (data) {
                    $("#cmts_" + p_id).text(numCmt);  //Show new Count Comments
                    $("#newCmt_" + p_id).append(data);  //Show cmt
                    $("[name='cmt_" + p_id + "']").trigger('reset'); //Clear text field
                },
            });
        }
    }); //Comment Function

    $(".numCmts").click(function () {
        var id = this.id;
        var p_id = id.split("_")[1];
        var textNumCmt = $("#cmts_" + p_id).text();
        if (parseInt(textNumCmt.split(" ")[0]) != 0) {
            $("#cmtOf_" + p_id).toggleClass("cmt-hide");
        }
    });   //Show-Hide All Comments if Comment != 0

    $(".inpNewCmt").keyup(function () {
        if ($("#" + this.id).val() != '') {
            $("#" + this.id).parent().find("button").prop('disabled', false);
        } else {
            $("#" + this.id).parent().find("button").prop('disabled', true);
        }
    });   //Active Send Button While Input Not Empty

    $(".delCmtBtn").click(function (e) {
        e.preventDefault();
        var newid = this.id.split("_")[1];
        var p_id = $("#" + this.id).parents('.cmt').attr("id").split("_")[1];
        $(".delCmtConfirm").attr("id", newid + "Of" + p_id);
        $("#delCmtModal").modal('show');
    });   //Show Delete Comment Modal

    // For User Infomation
    $('#password_cur').blur(function (id, passwordCurrent) {
        var passwordCurrent = $('#password_cur').val()
        var id = $('#user_id').val()
        $.ajax({
            type: "post",
            url: "userProfile/index.php",
            data: {
                'id': id,
                'password_cur': passwordCurrent
            },
            success: function (data) {
                if (data == 'false') {
                    $('#password_cur').css('border', '1px solid red')
                } else {
                    $('#password_cur').css('border', '1px solid green')
                    //kiểm tra nhập lại mật khẩu
                    $('#password_conf').keyup(function () {
                        var passwordNew = $('#password_new').val()
                        var passwordConf = $('#password_conf').val()
                        if (passwordConf != passwordNew) {
                            $('#password_conf').css('border', '1px solid red')
                        } else {
                            $('#password_conf').css('border', '1px solid green')

                            $('#saveProfile').removeAttr('disabled')
                        }
                    })
                }
            }
        })
    })  //Check Password Current

    $('#saveProfile').click(function () {
        var id = $('#user_id').val()
        var passwordNew = $('#password_new').val()
        $.ajax({
            type: "post",
            url: "userProfile/index.php",
            data: {
                'id': id,
                'password_new': passwordNew
            },
            success: function (data) {
                swal({
                    title: "Đổi mật khẩu thành công",
                    icon: "success",
                    button: "Đóng",
                }).then(() => {
                    window.location.reload(true)
                })
            }
        })
    });  // Change Password

    new jBox('Modal', {
        attach: '#load-order',
        height: 300,
        width: 700,
        closeButton: 'title',
        animation: 'zoomIn',
        title: 'Đơn hàng của bạn',
        ajax: {
            url: './models/ajax.php',
            data: {
                'load_order': true,
            },
            method: 'post',
            reload: 'strict',
            setContent: false,
            beforeSend: function () {
                $(".jBox-content").empty();
                $(".order-tbody").empty();
                this.setContent('');
                this.setTitle(
                    '<b class="ajax-sending">Đang tải đơn hàng...</b>'
                );
            },
            complete: function () {
                this.setTitle('<b class="ajax-complete">Đơn hàng của bạn</b>');
            },
            success: function (data) {
                $(".jBox-content").append("<table class='table widget-26'> <tbody class='order-tbody'> </tbody> </table>");
                data = jQuery.parseJSON(data);
                console.log(data);
                $.each(data, function (key, value) {
                    $('.order-tbody').append(`
                        <tr>
                            <td>
                                <div class="widget-26-job-emp-img">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="Company" />
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-title">
                                    <a >Senior Software Engineer / Developer</a>
                                    <p class="m-0"><a  class="employer-name">Đơn hàng #${value.order_id}</a> <span class="text-muted time"> ${value.order_date}</span></p>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-info">
                                    <p class="type m-0">Tổng đơn hàng:</p>
                                    <p class="text-muted m-0"><span class="location">${value.total_amount}</span></p>
                                </div>
                            </td>
                            <td>
                                <div class="widget-26-job-category bg-soft-base">
                                    <span>${value.status}Đã tiếp nhận</span>
                                </div>
                            </td>
                        </tr>
                    `);
                });
            },
            error: function () {
                this.setContent(
                    '<div class="ajax-error">Có lỗi xảy ra</div>'
                );
            }
        }
    }); //Show orders
});