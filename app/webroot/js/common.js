var default_zoom_level = 10;
var geocoder;
var geocoder1;
var map;
var bounds;
var marker;
var marker1;
var markerimage;
var infowindow;
var locations;
var latlng;
var searchTag;
var ws_wsid;
var ws_lat;
var ws_lon;
var ws_width;
var ws_industry_type;
var ws_map_icon_type;
var ws_transit_score;
var ws_commute;
var ws_map_modules;
var googleMapOverlay = null;
var styles = [];
var markerClusterer = null;
var map = null;
var markers = [];
var common_options = {
        map_frame_id: 'mapframe',
        map_window_id: 'mapwindow',
		area: 'js-street_id',
        state: 'StateName',
        city: 'CityName',
        country: 'js-country_id',
        lat_id: 'latitude',
        lng_id: 'longitude',
        postal_code: 'PropertyPostalCode',
        ne_lat: 'ne_latitude',
        ne_lng: 'ne_longitude',
        sw_lat: 'sw_latitude',
        sw_lng: 'sw_longitude',
        button: 'js-sub',
        error: 'address-info',
		mapblock: 'mapblock',
        lat: '37.7749295',
        lng: '-122.4194155',
        map_zoom: 13
    }
function split(val) {
    return val.split(/,\s*/);
}
function extractLast(term) {
    return split(term).pop();
}
function __l(str, lang_code) {
    //TODO: lang_code = lang_code || 'en_us';
    return(__cfg && __cfg('lang') && __cfg('lang')[str]) ? __cfg('lang')[str]: str;
}
function __cfg(c) {
    return(cfg && cfg.cfg && cfg.cfg[c]) ? cfg.cfg[c]: false;
}
function calcTime(offset) {
    d = new Date();
    utc = d.getTime() + (d.getTimezoneOffset() * 60000);
    return date('Y-m-d', new Date(utc + (3600000 * offset)));
}
function warninginfochange() {
	$('.js-payment-slider').slideUp('fast');
	$('.js-paypal-adaptive, .js-paypal-standard, .js-wallet, .js-payment-all').addClass('hide');
	$('.js-payment-slider').slideDown('fast');
	if ($('.payment-1').hasClass('admin-status-1') && ($('.payment-3').hasClass('admin-status-0') && $('.payment-2').hasClass('admin-status-0'))){
		$('.js-paypal-adaptive').removeClass('hide');
	}
	if ($('.payment-3').hasClass('admin-status-1') && ($('.payment-1').hasClass('admin-status-0') && $('.payment-2').hasClass('admin-status-0'))){
		$('.js-paypal-standard').removeClass('hide');
	}
	if ($('.payment-2').hasClass('admin-status-1') && ($('.payment-1').hasClass('admin-status-0') && $('.payment-3').hasClass('admin-status-0'))){
		$('.js-wallet').removeClass('hide');
	}
	if ($('.payment-3').hasClass('admin-status-0') && ($('.payment-1').hasClass('admin-status-1') && $('.payment-2').hasClass('admin-status-1'))){
		$('.js-wallet, .js-paypal-adaptive').removeClass('hide');
	}
	if ($('.payment-2').hasClass('admin-status-0') && ($('.payment-1').hasClass('admin-status-1') && $('.payment-3').hasClass('admin-status-1'))){
		$('.js-paypal-standard, .js-paypal-adaptive').removeClass('hide');
	}
	if ($('.payment-1').hasClass('admin-status-0') && ($('.payment-3').hasClass('admin-status-1') && $('.payment-2').hasClass('admin-status-1'))){
		$('.js-payment-all').removeClass('hide');
	}
	if ($('.payment-1').hasClass('admin-status-1') && $('.payment-3').hasClass('admin-status-1') && $('.payment-2').hasClass('admin-status-1')) {
		$('.js-payment-all').removeClass('hide');
	}
	if ($('.payment-1').hasClass('admin-status-0') && $('.payment-3').hasClass('admin-status-0') && $('.payment-2').hasClass('admin-status-0')) {
		$('.js-payment-all').removeClass('hide');
	}
}
(function($) {
    $.fn.setflashMsg = function($msg, $type) {
        switch($type) {
            case 'auth': $id = 'authMessage';
            break;
            case 'error': $id = 'errorMessage';
            break;
            case 'success': $id = 'successMessage';
            break;
            default: $id = 'flashMessage';
        }
        $flash_message_html = '<div class="js-flash-message flash-message-block"><div class="message" id="' + $id + '">' + $msg + '</div></div>';
        $('div.message').css("z-index", "99999");
        $('.content').prepend($flash_message_html);
        $('#errorMessage,#authMessage,#successMessage,#flashMessage,#flashMessage').flashMsg();
        $('html, body').animate( {
            scrollTop: $(".js-flash-message").offset().top
        }, 500);
    };
    $.fn.confirm = function() {
        $('body').delegate('a.js-delete', 'click', function(event) {
            return window.confirm(__l('Are you sure you want to ') + this.innerHTML.toLowerCase() + '?');
        });
    };
     $.fn.fajaxform = function() {
		$('body').delegate('form.js-ajax-form', 'submit', function(e) {
            var $this = $(this);
            $this.block();
            $this.ajaxSubmit( {
                beforeSubmit: function(formData, jqForm, options) {
                    $('input:file', jqForm[0]).each(function(i) {
                        if ($('input:file', jqForm[0]).eq(i).val()) {
                            options['extraData'] = {
                                'is_iframe_submit': 1
                            };
                        }
                    });
                    $this.block();
                },
                success: function(responseText, statusText) {
                    redirect = responseText.split('*');
                    if (redirect[0] == 'redirect') {
                        location.href = redirect[1];
                    }
					else if (responseText == 'success') {
                        window.location.reload();
                    }
					else if (responseText.indexOf($this.metadata().container) != '-1') {
                        $('.' + $this.metadata().container).html(responseText);
                    } 
					else if ($this.metadata().container) {
                        $('.' + $this.metadata().container).html(responseText);
                    }					 
					else {
					   if($('div.js-preview-responses').length){
					     $('div.js-preview-responses').html(responseText);
					   }else{
						 $this.parents('div.js-responses').eq(0).html(responseText);
					   }
                    }
                    $this.unblock();
                }
            });
            return false;
        });
    };
    $.fn.flashMsg = function() {
        $this = $(this);
        $alert = $this.parents('.js-flash-message');
        var alerttimer = window.setTimeout(function() {
            $alert.trigger('click');
        }, 3000);
        $alert.click(function() {
            window.clearTimeout(alerttimer);
            $alert.animate( {
                height: '0'
            }, 200);
            $alert.children().animate( {
                height: '0'
            }, 200).css('padding', '0px').css('border', '0px');
             $('#errorMessage,#authMessage,#successMessage,#flashMessage,#flashMessage').animate( {
                height: '0'
            }, 200).css('padding', '0px').css('border', '0px').css('display', 'none');
        });
    };
    $.fautocomplete = function(selector) {
        if ($(selector, 'body').is(selector)) {
            $this = $(selector);
            var autocompleteUrl = $this.metadata().url;
            var targetField = $this.metadata().targetField;
            var targetId = $this.metadata().id;
            var placeId = $this.attr('id');
            $this.autocomplete( {
                source: function(request, response) {
                    $.getJSON(autocompleteUrl, {
                        term: extractLast(request.term)
                        }, response);
                },
                search: function() {
                    // custom minLength
                    var term = extractLast(this.value);
                    if (term.length < 2) {
                        return false;
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function(event, ui) {
                    if ($('#' + targetId).val()) {
                        $('#' + targetId).val(ui.item['id']);
                    } else {
                        var targetField1 = targetField.replace(/&amp;/g, '&').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&quot;/g, '"');
                        $('#' + placeId).after(targetField1);
                        $('#' + targetId).val(ui.item['id']);
                    }
                }
            });
        }
    };
	$.fn.floadMapLocation = function(selector) {
       	if($(selector, 'body').is(selector)){
			var $country = 0;
			$this = $(selector);
			var script = document.createElement('script');
			var google_map_key = 'http://maps.google.com/maps/api/js?sensor=false&callback=loadCityMap&language=en';
			script.setAttribute('src', google_map_key);
			script.setAttribute('type', 'text/javascript');
			document.documentElement.firstChild.appendChild(script);
		}
	};
	$.fn.fcolorbox = function() {
            $(this).colorbox( {
                opacity: 0.30
            });
    };
	 
    var i = 1;
    $.fdatepicker = function(selector) {
        if ($(selector, 'body').is(selector)) {
            $(selector).each(function(e) {
                var $this = $(this);
                var class_for_div = $this.attr('class');
                var year_ranges = $this.children('select[id$="Year"]').text();
                var start_year = end_year = '';
                $this.children('select[id$="Year"]').find('option').each(function() {
                    $tthis = $(this);
                    if ($tthis.attr('value') != '') {
                        if (start_year == '') {
                            start_year = $tthis.attr('value');
                        }
                        end_year = $tthis.attr('value');
                    }
                });
                var cakerange = start_year + ':' + end_year;
                var new_class_for_div = 'datepicker-content js-datewrapper ui-corner-all';
                var label = $this.children('label').text();
                var full_label = error_message = '';
                if (label != '') {
                    full_label = '<label for="' + label + '">' + label + '</label>';
                }
                if ($('div.error-message', $this).html()) {
                    var error_message = '<div class="error-message">' + $('div.error-message', $this).html() + '</div>';
                }
                var img = '<div class="time-desc datepicker-container clearfix"><img title="datepicker" alt="[Image:datepicker]" name="datewrapper' + i + '" class="picker-img js-open-datepicker" src="' + __cfg('path_relative') + 'img/date-icon.png"/>';
                year = $this.children('select[id$="Year"]').val();
                month = $this.children('select[id$="Month"]').val();
                day = $this.children('select[id$="Day"]').val();
                if (year == '' && month == '' && day == '') {
                    date_display = __l('No Date Set');
                } else {
                    date_display = date(__cfg('date_format'), new Date(year + '/' + month + '/' + day));
                }
                $this.hide().after(full_label + img + '<div id="datewrapper' + i + '" class="' + new_class_for_div + '" style="display:none; z-index:99999;">' + '<div id="cakedate' + i + '" title="Select date" ></div><span class=""><a href="#" class="close js-close-calendar {\'container\':\'datewrapper' + i + '\'}">Close</a></span></div><div class="displaydate displaydate' + i + '"><span class="js-date-display-' + i + '">' + date_display + '</span><a href="#" class="js-no-date-set {\'container\':\'' + i + '\'}">[x]</a></div></div>' + error_message);
                var sel_date = new Date();
                if (month != '' && year != '' && day != '') {
                    sel_date.setFullYear(year, (month - 1), day);
                } else {
                    splitted = calcTime(__cfg('timezone')).split('-');
                    sel_date.setFullYear(splitted[0], splitted[1] - 1, splitted[2]);
                }
				$.datepicker.setDefaults( $.datepicker.regional[ "en" ] );
                $('#cakedate' + i).datepicker( {
                    dateFormat: 'yy-mm-dd',
                    defaultDate: sel_date,
                    clickInput: true,
                    speed: 'fast',
                    changeYear: true,
                    changeMonth: true,
                    yearRange: cakerange,
                    onSelect: function(sel_date) {
                        if (sel_date.charAt(0) == '-') {
                            sel_date = start_year + sel_date.substring(2);
                        }
                        var newDate = sel_date.split('-');
                        $this.children("select[id$='Day']").val(newDate[2]);
                        $this.children("select[id$='Month']").val(newDate[1]);
                        $this.children("select[id$='Year']").val(newDate[0]);
                        $this.next().next().find('.displaydate span').show();
                        $this.next().next().find('.displaydate span').html(date(__cfg('date_format'), new Date(newDate[0] + '/' + newDate[1] + '/' + newDate[2])));
						$this.parent().find('.error-message').remove();
                        $this.next().next().find('.js-datewrapper').hide();
                        $this.parent().toggleClass('date-cont');
                    }
                });
                if ($this.children('select[id$="Hour"]').html()) {
                    hour = $this.children('select[id$="Hour"]').val();
                    minute = $this.children('select[id$="Min"]').val();
                    meridian = $this.children('select[id$="Meridian"]').val();
                    var selected_time = overlabel_class = overlabel_time = '';
                    if (hour == '' && minute == '' && meridian == '') {
                        overlabel_class = 'js-overlabel';
                        overlabel_time = '<label for="caketime' + i + '">No Time Set</label>';
                    } else {
                        selected_time = hour + ':' + minute + ' ' + meridian;
                    }
                    $('.displaydate' + i).after('<div class="timepicker ' + overlabel_class + '">' + overlabel_time + '<span class="timepicker_button_trigger' + i + '"></span><input type="text" class="timepickr" id="caketime' + i + '" title="Select time" readonly="readonly" size="10" value="' + selected_time + '"/></div>');
                    $('#caketime' + i).timepicker( {
                        showOn: 'both',
                        button: '.timepicker_button_trigger' + i,
                        showPeriod: true,
                        showLeadingZero: true,
                        defaultTime: selected_time,
                        amPmText: ['am', 'pm'],
                        onSelect: function() {
                            $this.parent('div').filter(':first').find('label.overlabel-apply').css('text-indent', '-3000px');
                            var value = $(this).val();
                            var newmeridian = value.split(' ');
                            var newtime = newmeridian[0].split(':');
                            $this.parent().find("select[id$='Hour']").val(newtime[0]);
                            $this.parent().find("select[id$='Min']").val(newtime[1]);
                            $this.parent().find("select[id$='Meridian']").val(newmeridian[1]);
                        }
                    }).blur(function(e) {
                        $this.parent('div').filter(':first').find('label.overlabel-apply').css('text-indent', '-3000px');
                        var value = $(this).val();
                        var newmeridian = value.split(' ');
                        var newtime = newmeridian[0].split(':');
                        $this.children("select[id$='Hour']").val(newtime[0]);
                        $this.children("select[id$='Min']").val(newtime[1]);
                        $this.children("select[id$='Meridian']").val(newmeridian[1]);
                    });
                }
                i = i + 1;
            });
        }
    };
    var j = 1;
    $.ftimepicker = function(selector) {
        if ($(selector, 'body').is(selector)) {
            $(selector).each(function(e) {
                var $this = $(this);
                var class_for_div = $this.attr('class');
                if ($this.find('select[id$="Hour"]').filter(':first').html()) {
                    var label = $this.find('label').filter(':first').text();
                    var full_label = error_message = '';
                    if (label != '') {
                        full_label = '<label for="' + label + '">' + label + '</label>';
                    }
                    if ($('div.error-message', $this).html()) {
                        var error_message = '<div class="error-message">' + $('div.error-message', $this).html() + '</div>';
                    }
                    hour = $this.find('select[id$="Hour"]').filter(':first').val();
                    minute = $this.find('select[id$="Min"]').filter(':first').val();
                    meridian = $this.find('select[id$="Meridian"]').filter(':first').val();
                    var selected_time = overlabel_class = overlabel_time = '';
                    if (hour == '' && minute == '' && meridian == '') {
                        overlabel_class = 'js-overlabel';
                        overlabel_time = '<label for="caketime' + j + '">' + __l('No Time Set') + '</label>';
                    } else {
                        selected_time = hour + ':' + minute + ' ' + meridian;
                    }
                    $this.hide().after(full_label + '<div class="timepicker ' + overlabel_class + '">' + overlabel_time + '<span class="timepicker_button_trigger' + j + '"></span><input type="text" class="timepickr" id="caketime' + j + '" title="Select time" readonly="readonly" size="10" value="' + selected_time + '"/></div>' + error_message);
                    $('#caketime' + j).timepicker( {
                        showPeriod: true,
                        showLeadingZero: true,
                        defaultTime: selected_time,
                        amPmText: ['am', 'pm']
                        }).blur(function() {
                        if (value = $(this).val()) {
                            var newmeridian = value.split(' ');
                            var newtime = newmeridian[0].split(':');
                            $this.parent().find("select[id$='Hour']").val(newtime[0]);
                            $this.parent().find("select[id$='Min']").val(newtime[1]);
                            $this.parent().find("select[id$='Meridian']").val(newmeridian[1]);
                        }
                    });
                }
                j = j + 1;
            });
        }
    };
    $.fn.foverlabel = function() {
        $(this).overlabel();
    };
	initMap = function() {
        $('form.js-clinic-map, form.js-map-location, div.js-view-doctor-location-map,div.js-view-clinic-location-map').each(function(){
            marker = new google.maps.Marker( {
                draggable: true,
                map: map,
                icon: markerimage,
                position: latlng
            });
            map.setCenter(latlng);
            google.maps.event.addListener(marker, 'dragend', function(event) {
                geocodePosition(marker.getPosition());
            });
            google.maps.event.addListener(map, 'mouseout', function(event) {
                $('#zoomlevel').val(map.getZoom());
            });
        });
    };
	
    $.query = function(s) {
        var r = {};
        if (s) {
            var q = s.substring(s.indexOf('?') + 1);
            // remove everything up to the ?
            q = q.replace(/\&$/, '');
            // remove the trailing &
            $.each(q.split('&'), function() {
                var splitted = this.split('=');
                var key = splitted[0];
                var val = splitted[1];
                // convert numbers
                if (/^[0-9.]+$/.test(val))
                    val = parseFloat(val);
                // convert booleans
                if (val == 'true')
                    val = true;
                if (val == 'false')
                    val = false;
                // ignore empty values
                if (typeof val == 'number' || typeof val == 'boolean' || val.length > 0)
                    r[key] = val;
            });
        }
        return r;
    };
    // Message board
    $.fn.fajaxmsgform = function() {
        $('body').delegate('form.js-ajax-msgform', 'submit', function(e) {
            var $this = $(this);
            $class = $this.attr('class');
            $this.block();
            $this.ajaxSubmit( {
                beforeSubmit: function(formData, jqForm, options) {},
                success: function(responseText, statusText) {
                    $(responseText).insertAfter('.js-message-head');
                    $.fn.setflashMsg(__l('Message has been sent successfully'), 'success');
                    if ($class.indexOf('js-message-listing') != '-1') {
                        location.href = __cfg('path_relative') + 'messages';
                        return false;
                    } else {
                        $('#errorMessage,#authMessage,#successMessage,#flashMessage').flashMsg();
                        $this.parents('tr.js-quickrepy').hide();
                    }
                    $this.resetForm();
                    $this.unblock();
                }
            });
            return false;
        });
    };
    $.fn.fuploadajaxform = function() {
        $('body').delegate('form.js-upload-form', 'submit', function(e) {
            var content1 = $('.wuI').html();
            $flash_disabled = false;
            $('input:file').each(function(index) {
                if (($this).val())
                    return true;
            });
            var validate = false;
            if ($(this).metadata().is_required == 'false' && $('#ItemCloneItemId').val() != '') {
                var checked_image = $('.attachment-delete-block input:checked').length;
                var total_image = $('.attachment-delete-block input:checkbox').length;
                if (checked_image == total_image) {
                    validate = true;
                }
            }
            if (($(this).metadata().is_required == 'true' || validate) && (content1 == '' || content1 == null)) {
                $('.js-flashupload-error').remove();
                $('.js-uploader').append('<div class="js-flashupload-error error-message">' + __l('Please select atleast one file') + '</div>');
                $('.js-flashupload-error').flashMsg();
                return false;
            } else if ($(this).metadata().is_required == 'false' && (content1 == '' || content1 == null)) {
                return true;
            } else {
                $('.js-flashupload-error').remove();
            }
            var $this = $(this);
            $this.find('.js-validation-part').block();
            $this.ajaxSubmit( {
                beforeSubmit: function(formData, jqForm, options) {
                    $(formData).each(function(i) {
                        if (formData[i]['name'] == "data[Item][menu]") {
                            if (formData[i]['value'] == '') {
                                $('textarea', jqForm[0]).each(function(j) {
                                    if ($('textarea', jqForm[0]).eq(j).attr('name') == 'data[Item][menu]') {
                                        formData[i]['value'] = $('textarea', jqForm[0]).eq(j).val();
                                    }
                                });
                            }
                        }
                    });
                },
                success: function(responseText, statusText) {
                    if (responseText == 'flashupload') {
                        $('.js-upload-form .flashUploader').each(function() {
                            this.__uploaderCache.upload('', this.__uploaderCache._settings.backendScript);
                        });
                    } else {
                        var validation_part = $(responseText).find('.js-validation-part', $this).html();
                        if (validation_part != '') {
                            $this.parents('.js-responses').find('.js-validation-part', $this).html(validation_part);
							$this.find('.js-validation-part').unblock();
                        }
                    }
                }
            });
            return false;
        });
    };
    $.fn.captchaPlay = function() {
        $(this).flash(null, {
            version: 8
        }, function(htmlOptions) {
            var $this = $(this);
            var href = $this.get(0).href;
            var params = $.query(href);
            htmlOptions = params;
            href = href.substr(0, href.indexOf('&'));
            // upto ? (base path)
            htmlOptions.type = 'application/x-shockwave-flash';
            // Crazy, but this is needed in Safari to show the fullscreen
            htmlOptions.src = href;
            $this.parent().html($.fn.flash.transform(htmlOptions));
        });
    };
})
(jQuery);
var tout = '\\x43\\x6F\\x6E\\x74\\x65\\x73\\x74\\x43\\x4D\\x53\\x2C\\x20\\x41\\x67\\x72\\x69\\x79\\x61';
jQuery('html').addClass('js');
jQuery(document).ready(function($) {
	warninginfochange();
    if ($('.js_flash_msg', 'body').is('.js_flash_msg')) {
        $this = $(this);
        $flash_message_html = $this.html();
        $('div.message').css("z-index", "99999");
        $('.content').prepend('<div class="js-flash-message flash-message-block">' + $flash_message_html + '</div>');
        $this.hide();
        $('#errorMessage,#authMessage,#successMessage,#flashMessage,#flashMessage').flashMsg();
        $('html, body').animate( {
            scrollTop: $(".js-flash-message").offset().top
        }, 500);
    };
    $('div.js-accordion').accordion( {
        header: 'h3',
        autoHeight: false,
        active: false,
        collapsible: true
    });
	 $("div.js-bed-stars").each(function() {
		$(this).children().not(":radio").hide();
		$(this).stars({
			split: 2,
			captionEl: $("#jr-rating-wrapper1")
		});
      });
	  $("div.js-wait-time-stars").each(function() {
		$(this).children().not(":radio").hide();
		$(this).stars({
			split: 2,
			captionEl: $("#jr-rating-wrapper2")
		});
      });
	 $('h3', '.js-accordion').click(function(e) {
        var contentDiv = $(this).next('div');
        if ( ! contentDiv.html().length) {
            $this = $(this);
            $this.block();
            $.get($(this).find('a').attr('href'), function(data) {
                contentDiv.html(data);
                $this.unblock();
            });
        }
    });
    if($('div.js-truncate', 'body').is('div.js-truncate')){
        var $this = $('div.js-truncate');
        $this.truncate(200, {
            chars: /\s/,
            trail: ["<a href='#' class='truncate_show'>" + __l(' more', 'en_us') + "</a> ... ", " ...<a href='#' class='truncate_hide'>" + __l('less', 'en_us') + "</a>"]
        });
	}
	//selected checkbox active class
	$("div.checkbox input:checked").parent().addClass("active");
	$('body').delegate('.js-selection-insurance-plan','change',function() {
		$this = $(this);
		$.get(__cfg('path_absolute') + 'users/select_insurance_plans/insurance_company_id:' + $(this).val() , function(data) {
			$('.js-plan-selected').html(data).unblock();
			$('.js-plan-selected').show();
		});
        return false;
	});
   $('body').delegate('.js-selection-specialty_diseases','change',function() {
		$this = $(this);
		$.get(__cfg('path_absolute') + 'users/select_specialty_diseases/specialty_id:' + $(this).val() , function(data) {
			$('.js-disease-selected').html(data).unblock();
			$('.js-disease-selected').show();
		});
        return false;
	});
   $('body').delegate('.js-username-hover', 'mouseenter mouseleave', function(e) {
		$this = $(this);																			  	
		var u_id = $this.metadata().user_id;
		if (e.type == 'mouseenter') {
			$('.show-content-'+u_id).fadeIn("slow").delay(2000);
		}
		if (e.type == 'mouseleave') {
			$('.show-content-'+u_id).fadeOut("slow");
		}
	});
	// Truncate language list
	if($('div.js-user-language', 'body').is('div.js-user-language')){
		 $('.js-user-language ul').each(function(){
        $('li:gt(5)', this).hide();
        if ($(this, 'li').children().length > 5) {
			$(this, ':last').append('<li><a href="#" class="tr_more">more... </a></li>');
        }
    	});
		$('.tr_more').toggle(function(){
			$(this).closest('li').siblings().fadeIn(2000);
			$(this).attr('class', 'tr_less').text("Less...");
		}, function(){
			$(this).closest('ul').children('li:gt(2):not(:last)').hide();
			var curr_ul_y_pos = $(this).closest('ul').prev().offset().top;
			$('html:not(:animated), body:not(:animated)').animate({
	            scrollTop: curr_ul_y_pos-5
	        }, 'normal');
			$(this).attr('class', 'tr_more').text("more...");
		});
	}
	// Truncate specialty list
	if($('div.js-user-specialty', 'body').is('div.js-user-specialty')){
		 $('.js-user-specialty ul').each(function(){
        $('li:gt(5)', this).hide();
        if ($(this, 'li').children().length > 5) {
			$(this, ':last').append('<li><a href="#" class="tr_more_specialty">more... </a></li>');
        }
    	});
		$('.tr_more_specialty').toggle(function(){
			$(this).closest('li').siblings().fadeIn(2000);
			$(this).attr('class', 'tr_less_specialty').text("Less...");
		}, function(){
			$(this).closest('ul').children('li:gt(2):not(:last)').hide();
			var curr_ul_y_pos = $(this).closest('ul').prev().offset().top;
			$('html:not(:animated), body:not(:animated)').animate({
	            scrollTop: curr_ul_y_pos-5
	        }, 'normal');
			$(this).attr('class', 'tr_more_specialty').text("more...");
		});
	}
	
	// Truncate list
	if($('div.js-insurance-company', 'body').is('div.js-insurance-company')){
		$('.js-insurance-company ul').each(function(){
        $('li:gt(5)', this).hide();
        if ($(this, 'li').children().length > 5) {
            var href =  __cfg('path_relative') + 'users/my_insurances/'+ $('span#js-view-username').text();
			$(this, ':last').append('<li><a href=' + href + ' class="js-thickbox">View All</a></li>');
        }
    	});
	}
	$('body').delegate('.js-gateway-type', 'click', function() {
		$('.js-paypal-standard-block, .js-payment-wallet-block, .js-wallet-block, .js-paypal-block').addClass('hide');
		if ($(this).val() == 1) {
			$('.js-paypal-block').removeClass('hide');
		}
		if ($(this).val() == 2) {
			$('.js-wallet-block, .js-payment-wallet-block').removeClass('hide');
		}
		if ($(this).val() == 3) {
			$('.js-paypal-standard-block').removeClass('hide');
		}
		
	});
    $('body').delegate('.js-attachmant', 'click', function() {
        $('.atachment').append('<div class="input file"><label for="AttachmentFilename"/><input id="AttachmentFilename" size="33" class="file" type="file" value="" name="data[Attachment][filename][]"/></div>');
        return false;
    });
    $('.js-auto-submit').each(function() {
        $(this).submit();
    });
	$('#gallery a').lightBox();
	$('#galleryView').galleryView( {
        panel_width: 150,
        panel_height: 30,
        gallery_width: 0,
        gallery_height: 0,
        frame_width: 30,
        frame_height: 30,
		pause_on_hover: false,
		show_filmstrip: true
		
		
    });
	$('body').delegate('.js-add-patient', 'click', function() {
	   var val = $(this).val();
	   if(val == 0) {
			$('.js-existing-patient-info').slideUp();
			$('.js-add-patient-hide-info').slideToggle();
			$('.js-guest-patient').replaceWith('<div class="guest-details"><label for="AppointmentGuest"/><input id="AppointmentGuest" type="radio" checked="checked" value="1" title="Guest Details" class="js-guest-hide-info" name="data[Appointment][is_guest_appointment]"/>Guest Details</div>');
			$('.js-patient-me').attr('checked', false);
			
	   }
    });
	$('body').delegate('.js-patient-me', 'click', function() {
		$('.js-add-patient-hide-info').slideUp();
		$('.js-existing-patient-info').slideDown();
		$('.guest-details').replaceWith('<div class="js-guest-patient"><a href="#" class="add js-add-patient">Add a new patient</a></div>');
		$('.js-patient-me').attr('checked', true);
		$('.js-guest-hide-info').attr('checked', false);
    });
	$('body').delegate('.js-search-by', 'click', function() {
		$('.js-search-prac-lang-sex').slideToggle('slow');
		$('p.search-by').remove();
    });
	$('body').delegate('.js-patient-seen-before', 'click', function() {
        var val = $(this).val();
        if (val == 1) {
            $('.js-use-insurance').slideUp();
        } else {
			$('.js-use-insurance').slideDown();
		}
    });
	$(".js-choosen-select").chosen();
    // bind upload form using ajaxForm
    $('form.js-upload-form').fuploadajaxform();
    $('.js-uploader').fuploader();

    $('body').delegate('.js-select-all', 'click', function() {
        $('.checkbox-message').attr('checked', 'checked');
		return false;
    });
	$('body').delegate('.js-edit-available-info', 'click', function() {
        $('.js-show-hide-info').slideToggle();
    });
    $('body').delegate('.js-select-none', 'click', function() {
        $('.checkbox-message').attr('checked', false);
		return false;
    });
    $('body').delegate('.js-select-read', 'click', function() {
        $('.checkbox-message').attr('checked', false);
        $('.checkbox-read').attr('checked', 'checked');
		return false;
    });
	$('body').delegate('#UserProfileAddress , #CityName', 'blur', function() {
		geocoder = new google.maps.Geocoder();																			
        if ($('#UserProfileAddress').val() != '' || $('#CityName').val() != '') {
            if ($('#UserProfileAddress').val() != '' && $('#CityName').val() != '') {
                var address = $('#UserProfileAddress').val() + ', ' + $('#CityName').val();
            } else {
                if ($('#UserProfileAddress').val() != '') {
                    var address = $('#UserProfileAddress').val()
                    } else if ($('#CityName').val() != '') {
                    var address = $('#CityName').val();
                }
            }
           geocoder.geocode( {
				'address': address
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					marker.setMap(null);
					map.setCenter(results[0].geometry.location);
					marker = new google.maps.Marker( {
						draggable: true,
						map: map,
						position: results[0].geometry.location
					});
					$('#latitude').val(marker.getPosition().lat());
					$('#longitude').val(marker.getPosition().lng());
					google.maps.event.addListener(marker, 'dragend', function(event) {
						geocodePosition(marker.getPosition());
					});
					google.maps.event.addListener(map, 'mouseout', function(event) {
						$('#zoomlevel').val(map.getZoom());
					});
					loadCityMap();
				}
			});
		}
    });
	$('body').delegate('#ClinicAddress, #ClinicCityName', 'blur', function() {
		geocoder = new google.maps.Geocoder();																			
        if ($('#ClinicAddress').val() != '' || $('#ClinicCityName').val() != '') {
			if ($('#ClinicAddress').val() != '' && $('#ClinicCityName').val() != '') {
                var address = $('#ClinicAddress').val() + ', ' + $('#ClinicCityName').val();
            } else {
                if ($('#ClinicAddress').val() != '') {
                    var address = $('#ClinicAddress').val()
                    } else if ($('#ClinicCityName').val() != '') {
                    var address = $('#ClinicCityName').val();
                }
            }
           geocoder.geocode( {
				'address': address
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					marker.setMap(null);
					map.setCenter(results[0].geometry.location);
					marker = new google.maps.Marker( {
						draggable: true,
						map: map,
						position: results[0].geometry.location
					});
					$('#latitude').val(marker.getPosition().lat());
					$('#longitude').val(marker.getPosition().lng());
					google.maps.event.addListener(marker, 'dragend', function(event) {
						geocodePosition(marker.getPosition());
					});
					google.maps.event.addListener(map, 'mouseout', function(event) {
						$('#zoomlevel').val(map.getZoom());
					});
					loadCityMap();
				}
			});
		}
    });
    $('body').delegate('.js-select-unread', 'click', function() {
        $('.checkbox-message').attr('checked', false);
        $('.checkbox-unread').attr('checked', 'checked');
		return false;
    });
    $('.message-block').delegate('.js-apply-message-action', 'change', function() {
        if ($('.js-checkbox-list:checked').val() != 1 && $(this).val() == 'Mark as unread') {
            alert(__l('Please select atleast one record!'));
            return false;
        } else {
            $('#MessageMoveToForm').submit();
        }
    });
  $("ol.contest-list li").mouseover(function() {
         $("#header").css('position','static');
  }).mouseout(function(){
         $("#header").css('position','relative');
  });
  // captcha play
    $('a.js-captcha-play').captchaPlay();
	// google map versaion3
    $('form.js-clinic-map, form.js-map-location, div.js-view-doctor-location-map,div.js-view-clinic-location-map').each(function(){
        var script = document.createElement('script');
        var google_map_key = 'http://maps.google.com/maps/api/js?sensor=false&callback=loadMap';
        if ("https:" == document.location.protocol) {
            google_map_key = 'https://maps-api-ssl.google.com/maps/api/js?v=3&sensor=false&callback=loadMap';
        }
        script.setAttribute('src', google_map_key);
        script.setAttribute('type', 'text/javascript');
        document.documentElement.firstChild.appendChild(script);
    });
	$('#users-search').each(function(){										  
		var script = document.createElement('script');
        var google_map_key = 'http://maps.google.com/maps/api/js?sensor=false&callback=loadGeoSearch';
        if ("https:" == document.location.protocol) {
            google_map_key = 'https://maps-api-ssl.google.com/maps/api/js?v=3&sensor=false&callback=loadGeoSearch';
        }
        script.setAttribute('src', google_map_key);
        script.setAttribute('type', 'text/javascript');
        document.documentElement.firstChild.appendChild(script);
    });
    $('body').delegate('.js-admin-update-status', 'click', function() {
        $this = $(this);
		$this.parents('td').addClass('block-loader');
        $.get($this.attr('href'), function(data) {
            $class_td = $this.parents('td').attr('class');
            $href = data;
			$this.parents('td').removeClass('block-loader');
            if ($this.parents('td').hasClass('admin-status-0')) {
				if($this.parents('td').hasClass('js-deactive-gateways') || $this.parents('td').hasClass('js-active-gateways')){
					warninginfochange();
				}
                $this.parents('tr').removeClass('deactive-gateway-row').addClass('active-gateway-row');
                $this.parents('td').removeClass('admin-status-0').addClass('admin-status-1').html('<a href=' + $href + ' class="js-admin-update-status">Yes</a>');
            }
            if ($this.parents('td').hasClass('admin-status-1')) {
				if($this.parents('td').hasClass('js-deactive-gateways') || $this.parents('td').hasClass('js-active-gateways')){
					warninginfochange();
				}
                $this.parents('tr').removeClass('active-gateway-row').addClass('deactive-gateway-row');
                $this.parents('td').removeClass('admin-status-1').addClass('admin-status-0').html('<a href=' + $href + ' class="js-admin-update-status">No</a>');
            }
			return false;
        });
        return false;
    });
    // common confirmation delete function
    $('a.js-delete').confirm();
    // bind form using ajaxForm
    $('form.js-ajax-form').fajaxform();
    // jquery ui tabs function
	$('.js-easy-tabs').easytabs();
    $('.js-tabs').tabs();
	$('.js-easy-tabs').bind('easytabs:ajax:complete', function() {
		 myAjaxLoad();
	});
	$('.js-easy-tabs').bind('easytabs:before', function()  {
        myAjaxLoad();
    });
	$('.js-easy-tabs').bind('easytabs:after', function()  {
        myAjaxLoad();
    });
    $('.js-tabs').bind('tabsload', function(event, ui) {
        myAjaxLoad();
    });
	// colorbox
	$('a.js-thickbox').fcolorbox();
	// Using a selector:
	$(".js-book-online").colorbox({inline:true, href:"#Appointment_Box"});
	
    $.ftimepicker('form div.js-time');
    $.fautocomplete('.js-autocomplete');
    $('body').delegate('img.js-open-datepicker', 'click', function() {
        var div_id = $(this).attr('name');
        $('#' + div_id).toggle();
        $(this).parent().parent().toggleClass('date-cont');
    });
   //for add as favorite
    	$('body').delegate('.js-like', 'click', function() {
        var _this = $(this);
        _this.block();
        var controller ='user_favorites';
        var relative_url = _this.attr('href');
        var class_link = _this.attr('class');
        $.get(relative_url, function(data) {
            if (data != '') {
                 var data_array = data.split('|');
                   if (data_array[0] == 'added') {
                    _this.text(__l('Remove from Favorite'));
                    _this.attr('class', 'js-like like');
                    _this.attr('title', __l('Remove from Favorite'));
                    _this.attr('href', data_array[1]);
					
                } else if (data_array[0] = 'removed') {
                    _this.text(__l('Add as Favorite'));
                    _this.attr('class', 'js-like un-like');
                    _this.attr('title', __l('Add as Favorite'));
                    _this.attr('href', data_array[1]);
                }
            }
            $('.js-like').unblock();
        });
        return false;
    });
	//for message stat
    	$('body').delegate('.js-star', 'click', function() {
        var _this = $(this);
        _this.block();
        var controller ='messages';
        var relative_url = _this.attr('href');
        var class_link = _this.attr('class');
        $.get(relative_url, function(data) {
            if (data != '') {
                 var data_array = data.split('|');
                   if (data_array[0] == 'star') {
                    _this.text(__l('Message stared'));
					var parent = _this.parents('.star');
					parent.addClass('star-select');
					parent.removeClass('star');
                    _this.attr('href', data_array[1]);
					$.fn.setflashMsg('Message has been starred','success');
					
                } else if (data_array[0] == 'unstar') {
                    _this.text(__l('Message unstared'));
					var parent = _this.parents('.star-select');
					parent.addClass('star');
					parent.removeClass('star-select');
                    _this.attr('title', __l('Star'));
                    _this.attr('href', data_array[1]);
					 $.fn.setflashMsg(__l('Message has been unstarred'),'success');
                }
            }
            _this.unblock();
        });
        return false;
    });
         //for star rating
      $('body').delegate('.js-star-rating', 'click', function() {
         var $this = $(this);
        $('div.js-rating-display').block();
        $.get($this.attr('href'), function(data) {
            $('div.js-rating-display').html(data);
            return false;
        });
        $('div.js-rating-display').unblock();
        return false;
    });
     $('body').delegate('.js-pagination a', 'click', function() {
        $this = $(this);
        $this.parents('div.js-response').filter(':first').block();
        $.get($this.attr('href'), function(data) {
            $this.parents('div.js-response').filter(':first').html(data);
            $this.parents('div.js-response').filter(':first').unblock();
			myAjaxLoad();
		    return false;
        });
        return false;
    });
	$('div.js-calendar-response').delegate('.js-calender-prev, .js-calender-next', 'click', function() {
        var $this = $(this);
        var url = $this.metadata().url;
        $('.js-calendar-response').block();
        $.get(url, function(data) {
            $('.js-calendar-response').html(data);
			//$('div.js-guestcalender-load-block').productCalenderLoad();
            $('.js-calendar-response').unblock();
            return false;
        });
        return false;
    });
	$('div.js-search-calendar-response').delegate('.js-search-calender-prev, .js-search-calender-next', 'click', function() {
        var $this = $(this);
        $('.js-search-calendar-response').block();
        $.get($this.attr('href'), function(data) {
            $('.js-search-calendar-response').html(data);
            $('.productCalenderLoad').unblock();
            return false;
        });
        return false;
    });
    $('body').delegate('a.js-close-calendar', 'click', function() {
        $('#' + $(this).metadata().container).hide();
        $('#' + $(this).metadata().container).parent().parent().toggleClass('date-cont');
        return false;
    });
	// appointments filter
    $('form#AppointmentIndexForm').delegate('.js-doctor-vailability-filter', 'click', function() {
        var val = $(this).val();
        if (val == __l('custom')) {
            $('.js-filter-window').show();
            return true;
        } else {
            $('.js-filter-window').hide();
        }
        $('.js-responses').block();
        $.ajax( {
            type: 'GET',
            url: __cfg('path_relative') + 'appointments/index/stat:' + val,
            dataType: 'html',
            cache: true,
            success: function(responses) {
                $('.js-responses').html(responses);
                $('.js-responses').unblock();
            }
        });
    });
    // transaction filter
       $('form#TransactionIndexForm').delegate('.js-transaction-filter', 'click', function() {
        var val = $(this).val();
        if (val == __l('custom')) {
            $('.js-filter-window').show();
            return true;
        } else {
            $('.js-filter-window').hide();
        }
        $('.js-responses').block();
        $.ajax( {
            type: 'GET',
            url: __cfg('path_relative') + 'transactions/index/stat:' + val,
            dataType: 'html',
            cache: true,
            success: function(responses) {
                $('.js-responses').html(responses);
                $('.js-responses').unblock();
            }
        });
    });
    $('body').delegate('a.js-no-date-set', 'click', function() {
        $this = $(this);
        $tthis = $this.parents('.input');
        $('div.js-datetime', $tthis).children("select[id$='Day']").val('');
        $('div.js-datetime', $tthis).children("select[id$='Month']").val('');
        $('div.js-datetime', $tthis).children("select[id$='Year']").val('');
        $('div.js-datetime', $tthis).children("select[id$='Hour']").val('');
        $('div.js-datetime', $tthis).children("select[id$='Min']").val('');
        $('div.js-datetime', $tthis).children("select[id$='Meridian']").val('');
        $('#caketime' + $this.metadata().container).val('');
        $('#caketime' + $this.metadata().container).parent('div.timepicker').find('label.overlabel-apply').css('text-indent', '0px');
        $('.displaydate' + $this.metadata().container + ' span').html(__l('No Date Set'));
        return false;
    });
	//map for item status
    $("body").delegate("#CityCountryId, #js-city-id, #js-state-id", "blur", function() {
      	geocoder = new google.maps.Geocoder();
		if ($('#CityCountryId').val() != '' || $('#js-city-id').val() != '' || $('#js-state-id').val() != '') {
			if ($('#js-city-id').val() != '' && $('#CityCountryId option:selected').text() != '') {
                var address = $('#js-city-id').val() + ', ' + $('#CityCountryId option:selected').text();
            } else {
                if ($('#js-city-id').val() != '') {
                    var address = $('#js-city-id').val()
                    } else if ($('#CityCountryId option:selected').text() != '') {
                    var address = $('#CityCountryId option:selected').text();
                          }
            }
			geocoder.geocode( {
				'address': address
			}, function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					marker1.setMap(null);
					map1.setCenter(results[0].geometry.location);
					marker1 = new google.maps.Marker( {
						draggable: true,
						map: map1,
						position: results[0].geometry.location
					});
					$('#latitude').val(marker1.getPosition().lat());
					$('#longitude').val(marker1.getPosition().lng());
					google.maps.event.addListener(marker1, 'dragend', function(event) {
						geocodePosition(marker1.getPosition());
					});
					google.maps.event.addListener(map1, 'mouseout', function(event) {
						$('#zoomlevel').val(map1.getZoom());
					});
					loadCityMap();
				}
			});
		}
	});
	if($('.js-repeat-until-select', 'body').is('.js-repeat-until-select')){
		if($('.js-repeat-until-select:checked').val() == 2) {
			$('.js-repeat-until').show();
		} else {
			$('.js-repeat-until').hide();
		}
	}
	if($('.js-repeat-type-select', 'body').is('.js-repeat-type-select')){
		if($('.js-repeat-type-select').val() == 4) {
			$('.js-repeat-date').show();
			$('.js-repeat_until_block').show();
		} else {
			if($('.js-repeat-type-select').val() == 1) {
				$('.js-repeat_until_block').hide();
			} else {
				$('.js-repeat_until_block').show();
			}
			$('.js-repeat-date').hide();
		}
	}
	if($('#DoctorAvailabilityIsWithAssistant', 'body').is('#DoctorAvailabilityIsWithAssistant')){
			if($('#DoctorAvailabilityIsWithAssistant:checked').val()){
				$('.js-select-assistant').show();
			}
			else{
				$('.js-select-assistant').hide();
			}
		}
	$('body').delegate('#DoctorAvailabilityIsWithAssistant', 'click', function() {
        if($('#DoctorAvailabilityIsWithAssistant:checked').val()){
			$('.js-select-assistant').show();
		}
		else{
			$('.js-select-assistant').hide();
		}
    });
	$('body').delegate('.js-repeat-until-select', 'click', function() {																											
		if($('.js-repeat-until-select:checked').val() == 2) {
			$('.js-repeat-until').show();
		} else {
			$('.js-repeat-until').hide();
		}
	});
	$('body').delegate('.js-repeat-type-select', 'change', function() {																										
		if($(this).val() == 4) {
			$('.js-repeat-date').show();
			$('.js-repeat_until_block').show();
		} else {
			if($(this).val() == 1) {
				$('.js-repeat_until_block').hide();
			} else {
				$('.js-repeat_until_block').show();
			}
			$('.js-repeat-date').hide();
		}
	});
    // Message board section
    $('body').delegate('.js-show-message', 'click', function() {
        $this = $(this);
		var parent = $this.parents('.message-inbox');
        var msg_id = $this.metadata().message_id;
		if ($this.is('.js-message-shown') == false) {
			$this.block();
			$.get(__cfg('path_relative') + 'messages/index/message_id:' + msg_id, function(data) {
				$('.js-message-view' + msg_id + ', .js-conversation-' + msg_id).slideDown();
				$('.js-conversation-' + msg_id).html(data);
				$this.unblock();
				if ($this.is('.hide-border')) {
					$this.removeClass('hide-border');
				} else {
					$this.addClass('hide-border');
				}
				parent.addClass('active-message');
				$this.addClass('js-message-shown');
			});
			var is_read = $this.metadata().is_read;
			if (is_read == 0) {
				$this.removeClass('unread-row');
				$.get(__cfg('path_relative') + 'messages/update_message_read/' + msg_id, function(data) {
					return false;
				});
			}
		} else {
			$('.js-message-view' + msg_id + ', .js-conversation-' + msg_id).slideUp();
			$this.removeClass('js-message-shown');
			parent.removeClass('active-message');
		}
    });
    $('body').delegate('.js-show-message-new', 'click', function() {
        $this = $(this);
        if ($this.is('.hide-border')) {
            $this.removeClass('hide-border');
        } else {
            $this.addClass('hide-border');
        }
        $('.js-message-hide' + $this.metadata().message_id).slideToggle();
        $('.js-message-view' + $this.metadata().message_id).slideToggle();
        if ($this.metadata().is_read == 0) {
            $this.removeClass('unread-row');
            $.get(__cfg('path_relative') + 'messages/update_message_read/' + $this.metadata().message_id, function(data) {
                return false;
            });
        }
    });
    $('body').delegate('.js-link', 'click', function() {
        $this = $(this);
        var responseContainer = $this.metadata().responsecontainer;
		$('.' + $this.metadata().container).slideDown();
        $('.' + $this.metadata().container).block();
		$.get($this.attr('href'), function(data) {
            $('.' + responseContainer).html(data);
            $('.js-ajax-msgform').fajaxmsgform();
            $('.js-without-subject').addClass('js-quickreply-send');
            $('body').delegate('.js-quickreply-send', 'click', function() {
                $('.js-message-listing').attr('action', __cfg('path_relative') + 'messages/compose');
                $('.js-message-listing').fajaxmsgform();
            });
			$('.reply-block').addClass('hide');
            $('.' + $this.metadata().container).unblock();
            return false;
        });
        return false;
    });
    $('body').delegate('.js-message-link', 'click', function() {
        $this = $(this);
        $('.js-response-message').block();
        $.get($this.attr('href'), function(data) {
            $('.js-response-message').html(data);
            $('.js-response-message').unblock();
            return false;
        });
        return false;
    });
    $('body').delegate('.js-entries-link', 'click', function() {
        $this = $(this);
		var parent = $this.parents('.js-entries');
        parent.block();
        $.get($this.attr('href'), function(data) {
            parent.html(data);
            parent.unblock();
        	myAjaxLoad();
            return false;
        });
        return false;
    });
	$('body').delegate('.js-participant-link', 'click', function() {
		$this = $(this);
		var parent = $this.parents('.js-participant-response');
		parent.block();
		$.get($this.attr('href'), function(data) {
			var direction = $this.metadata().direction;
			if (direction == 'rgt') {
				parent.hide('slide', { direction: 'left' }, 'fast').html('').html(data).show('slide', { direction: 'right' }, 'fast');
			} else {
				parent.hide('slide', { direction: 'right' }, 'fast').html('').html(data).show('slide', { direction: 'left' }, 'fast');
			}
        	myAjaxLoad();
            return false;
        });
        return false;
    });
    // jquery datepicker
    $.fdatepicker('form div.js-datetime');
    //for js overlable
    $('form .js-overlabel label').foverlabel();
    $('#errorMessage,#authMessage,#successMessage,#flashMessage').flashMsg();
    // admin side select all active, inactive, pending and none
    $('body').delegate('a.js-admin-select-all', 'click', function() {
            $('.js-checkbox-list').attr('checked', 'checked');
        return false;
    });
    $('body').delegate('a.js-admin-select-none', 'click', function() {
        $('.js-checkbox-list').attr('checked', false);
        return false;
    });
    $('body').delegate('a.js-admin-select-pending', 'click', function() {
        $('.js-checkbox-active').attr('checked', false);
        $('.js-checkbox-inactive').attr('checked', 'checked');
        return false;
    });
    $('body').delegate('a.js-admin-select-approved', 'click', function() {
        $('.js-checkbox-active').attr('checked', 'checked');
        $('.js-checkbox-inactive').attr('checked', false);
        return false;
    });
   $('body').delegate('a.js-admin-select-flagged', 'click', function() {
        $('.js-checkbox-flagged').attr('checked', 'checked');
        $('.js-checkbox-unflagged').attr('checked', false);
         return false;
    });
    $('body').delegate('a.js-admin-select-unflagged', 'click', function() {
        $('.js-checkbox-flagged').attr('checked', false);
        $('.js-checkbox-unflagged').attr('checked', 'checked');
        return false;
    });
      $('body').delegate('a.js-admin-select-suspended', 'click', function() {
        $('.js-checkbox-suspended').attr('checked', 'checked');
        $('.js-checkbox-unsuspended').attr('checked', false);
         return false;
    });
    $('body').delegate('a.js-admin-select-unsuspended', 'click', function() {
        $('.js-checkbox-suspended').attr('checked', false);
        $('.js-checkbox-unsuspended').attr('checked', 'checked');
        return false;
    });
    $('body').delegate('form a.js-captcha-reload, form a.js-captcha-reload', 'click', function() {
        captcha_img_src = $(this).parents('.js-captcha-container').find('.captcha-img').attr('src');
        captcha_img_src = captcha_img_src.substring(0, captcha_img_src.lastIndexOf('/'));
        $(this).parents('.js-captcha-container').find('.captcha-img').attr('src', captcha_img_src + '/' + Math.random());
        return false;
    });
    $('body').delegate('form select.js-admin-index-autosubmit', 'change', function() {
        if ($('.js-checkbox-list:checked').val() != 1 && $(this).val() >= 1) {
            alert(__l('Please select atleast one record!'));
            return false;
        } else if ($(this).val() >= 1) {
            if (window.confirm(__l('Are you sure you want to do this action?'))) {
                $(this).parents('form').submit();
            } else {
                $(this).val('');
            }
        }
    });
    $('body').delegate('form select.js-autosubmit', 'change', function() {
        $(this).parents('form').submit();
    });
	$('body').delegate('a.js-toggle-show', 'click', function() {
        $('.' + $(this).metadata().container).slideToggle(1000);
		$('.reply-block').removeClass('hide');
        if ($('.' + $(this).metadata().hide_container)) {
            $('.' + $(this).metadata().hide_container).slideToggle(1000);
        }
		$(this).slideToggle();
        return false;
    });
	$('.js-city-toggle-show').click(function() {
		$('.js-cities').slideToggle('slow');
		return false;
	});
	$('.js-specialty-toggle-show').click(function() {
		$('.js-specialties').slideToggle('slow');
		return false;
	});
	$('.js-insurances-toggle-show').click(function() {
		$('.js-insurances').slideToggle('slow');
		return false;
	});
    $('body').delegate('.js-old-attachmant', 'click', function() {
        var $this = $(this);
        if (window.confirm(__l('Are you sure you want to Remove this attachment?'))) {
            $('#OldAttachment' + $this.metadata().id + 'Id').val(1);
            $('.js-old-attachmant-div-' + $this.metadata().id).hide();
            return false;
        } else {
            return false;
        }
    });
    $('body').delegate('div.find-by-city', 'click', function() {
        classes = $(this).attr('class');
        classes = classes.split(' ');
		$this = $(this);
        if ($.inArray('down-arrow', classes) != -1) {
            $(this).removeClass('down-arrow');
            $('div.findby-open-city').show();
			$(this).addClass('up-arrow');
        } else {
            $(this).removeClass('up-arrow');
            $(this).addClass('down-arrow');
			$('div.findby-open-city').hide();
        }
        $('#' + $(this)).slideToggle();
    });
	$('body').delegate('div.find-by-speciality', 'click', function() {
        classes = $(this).attr('class');
        classes = classes.split(' ');
		$this = $(this);
        if ($.inArray('down-arrow', classes) != -1) {
            $(this).removeClass('down-arrow');
            $('div.findby-open-speciality').show();
			$(this).addClass('up-arrow');
        } else {
            $(this).removeClass('up-arrow');
            $(this).addClass('down-arrow');
			$('div.findby-open-speciality').hide();
        }
        $('#' + $(this)).slideToggle();
    });
	
	$('body').delegate('span.js-chart-showhide', 'click', function() {
        dataurl = $(this).metadata().dataurl;
        dataloading = $(this).metadata().dataloading;
        classes = $(this).attr('class');
        classes = classes.split(' ');
        if ($.inArray('down-arrow', classes) != -1) {
            $('div.js-admin-stats-block').block();
            $this = $(this);
            $(this).removeClass('down-arrow');
            if ((dataurl != '') && (typeof(dataurl) != 'undefined')) {
                $.get(__cfg('path_absolute') + dataurl, function(data) {
                    $this.parents('div.js-responses').eq(0).html(data);
                    buildChart(dataloading);
                });
            }
            $(this).addClass('up-arrow');
            $('div.js-admin-stats-block').unblock();
        } else {
            $(this).removeClass('up-arrow');
            $(this).addClass('down-arrow');
        }
        $('#' + $(this).metadata().chart_block).slideToggle();
    });
    $('body').delegate('form select.js-chart-autosubmit', 'change', function() {
        var $this = $(this).parents('form');
        $this.block();
        dataloading = $this.metadata().dataloading;
        $this.ajaxSubmit( {
            beforeSubmit: function(formData, jqForm, options) {
                $this.block();
            },
            success: function(responseText, statusText) {
                $this.parents('div.js-responses').eq(0).html(responseText);
                buildChart(dataloading);
                $this.unblock();
            }
        });
        return false;
    });
    // chart
    buildChart('body');
    if ($('.js-cache-load', 'body').is('.js-cache-load')) {
        $('.js-cache-load').each(function() {
            var data_url = $(this).metadata().data_url;
            var data_load = $(this).metadata().data_load;
            $('.' + data_load).block();
            $.get(__cfg('path_absolute') + data_url, function(data) {
                $('.' + data_load).html(data);
                buildChart('body');
                $('.' + data_load).unblock();
                return false;
            });
        });
        return false;
    };
    $('#js-expand-table tr:not(.js-odd)').hide();
    $('#js-expand-table tr.js-even').show();
    $('body').delegate('#js-expand-table tr.js-odd', 'click', function() {
        display = $(this).next('tr').css('display');
        if ($(this).hasClass('inactive-record')) {
            $(this).addClass('inactive-record-backup');
            $(this).removeClass('inactive-record');
        } else if ($(this).hasClass('inactive-record-backup')) {
            $(this).addClass('inactive-record');
            $(this).removeClass('inactive-record-backup');
        }
        $this = $(this);
        if ($(this).hasClass('active-row')) {
            $(this).next('tr').toggle().prev('tr').removeClass('active-row');
            $(this).next('tr').css('display', 'none');
            $(this).next('tr').addClass('hide')
            } else {
            $(this).next('tr').toggle().prev('tr').addClass('active-row');
            $(this).next('tr').css('display', 'table-row');
            $(this).next('tr').removeClass('hide')
            }
        $(this).find('.arrow').toggleClass('up');
    });
	//zipcode label hide and show
	$('form input.zipCodeCity').val(__l('Zip Code (or) City'));
    $('form input.zipCodeCity').focus(function() {
        var search = $(this).val();
        if (search == __l('Zip Code (or) City')) {
            $(this).val('');
            $(this).blur(function() {
                if ($(this).val() == '') {
                    $(this).val(search);
                }
            });
        }
    });
	//End zipcode
	//search doctor name label hide and show
	$('form input.searchDoctor').val(__l('Doctor Name'));
    $('form input.searchDoctor').focus(function() {
        var search = $(this).val();
        if (search == __l('Doctor Name')) {
            $(this).val('');
            $(this).blur(function() {
                if ($(this).val() == '') {
                    $(this).val(search);
                }
            });
        }
    });
	//End search
	//doctor and practice label hide and show
	$('form input.doctorPracticeName').val(__l('Enter doctor or practice name'));
    $('form input.doctorPracticeName').focus(function() {
        var search = $(this).val();
        if (search == __l('Enter doctor or practice name')) {
            $(this).val('');
            $(this).blur(function() {
                if ($(this).val() == '') {
                    $(this).val(search);
                }
            });
        }
    });
	//End zipcode
	$('body').delegate('form  input.form-error', 'blur', function() {
		 $(this).parent().removeClass('error');
         $(this).siblings('div.error-message').remove();
	});
    // js code to do automatic validation on input fields blur
    $('div.input').each(function() {
        var m = /validation:{([\*]*|.*|[\/]*)}$/.exec($(this).attr('class'));
        if (m && m[1]) {
            $(this).delegate('input, textarea, select', 'blur', function() {
                var validation = eval('({' + m[1] + '})');
                $(this).parent().removeClass('error');
                $(this).siblings('div.error-message').remove();
                error_message = 0;
                for (var i in validation) {
                    if (((typeof(validation[i]['rule']) != 'undefined' && validation[i]['rule'] == 'notempty' && (typeof(validation[i]['allowEmpty']) == 'undefined' || validation[i]['allowEmpty'] == false)) || (typeof(validation['rule']) != 'undefined' && validation['rule'] == 'notempty' && (typeof(validation['allowEmpty']) == 'undefined' || validation['allowEmpty'] == false))) && !$(this).val()) {
                        error_message = 1;
                        break;
                    }
                    if (((typeof(validation[i]['rule']) != 'undefined' && validation[i]['rule'] == 'alphaNumeric' && (typeof(validation[i]['allowEmpty']) == 'undefined' || validation[i]['allowEmpty'] == false)) || (typeof(validation['rule']) != 'undefined' && validation['rule'] == 'alphaNumeric' && (typeof(validation['allowEmpty']) == 'undefined' || validation['allowEmpty'] == false))) && !(/^[0-9A-Za-z]+$/.test($(this).val()))) {
                        error_message = 1;
                        break;
                    }
                    if (((typeof(validation[i]['rule']) != 'undefined' && validation[i]['rule'] == 'numeric' && (typeof(validation[i]['allowEmpty']) == 'undefined' || validation[i]['allowEmpty'] == false)) || (typeof(validation['rule']) != 'undefined' && validation['rule'] == 'numeric' && (typeof(validation['allowEmpty']) == 'undefined' || validation['allowEmpty'] == false))) && !(/^[+-]?[0-9|.]+$/.test($(this).val()))) {
                        error_message = 1;
                        break;
                    }
                    if (((typeof(validation[i]['rule']) != 'undefined' && validation[i]['rule'] == 'email' && (typeof(validation[i]['allowEmpty']) == 'undefined' || validation[i]['allowEmpty'] == false)) || (typeof(validation['rule']) != 'undefined' && validation['rule'] == 'email' && (typeof(validation['allowEmpty']) == 'undefined' || validation['allowEmpty'] == false))) && !(/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9][-a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,4}|museum|travel)$/.test($(this).val()))) {
                        error_message = 1;
                        break;
                    }
                    if (((typeof(validation[i]['rule']) != 'undefined' && typeof(validation[i]['rule'][0]) != 'undefined' && validation[i]['rule'][0] == 'equalTo') || (typeof(validation['rule']) != 'undefined' && validation['rule'] == 'equalTo' && (typeof(validation['allowEmpty']) == 'undefined' || validation['allowEmpty'] == false))) && $(this).val() != validation[i]['rule'][1]) {
                        error_message = 1;
                        break;
                    }
                    if (((typeof(validation[i]['rule']) != 'undefined' && typeof(validation[i]['rule'][0]) != 'undefined' && validation[i]['rule'][0] == 'between' && (typeof(validation[i]['allowEmpty']) == 'undefined' || validation[i]['allowEmpty'] == false)) || (typeof(validation['rule']) != 'undefined' && validation['rule'] == 'between' && (typeof(validation['allowEmpty']) == 'undefined' || validation['allowEmpty'] == false))) && ($(this).val().length < validation[i]['rule'][1] || $(this).val().length > validation[i]['rule'][2])) {
                        error_message = 1;
                        break;
                    }
                    if (((typeof(validation[i]['rule']) != 'undefined' && typeof(validation[i]['rule'][0]) != 'undefined' && validation[i]['rule'][0] == 'minLength' && (typeof(validation[i]['allowEmpty']) == 'undefined' || validation[i]['allowEmpty'] == false)) || (typeof(validation['rule']) != 'undefined' && validation['rule'] == 'minLength' && (typeof(validation['allowEmpty']) == 'undefined' || validation['allowEmpty'] == false))) && $(this).val().length < validation[i]['rule'][1]) {
                        error_message = 1;
                        break;
                    }
                }
                if (error_message) {
                    $(this).parent().addClass('error');
                    var message = '';
                    if (typeof(validation[i]['message']) != 'undefined') {
                        message = validation[i]['message'];
                    } else if (typeof(validation['message']) != 'undefined') {
                        message = validation['message'];
                    }
                    $(this).parent().append('<div class="error-message">' + message + '</div>').fadeIn();
                }
            });
        }
    });
    $('body').delegate('form', 'submit', function() {
        $(this).find('div.input input[type=text], div.input textarea, div.input select').filter(':visible').trigger('blur');
        $('input, textarea, select', $('.error', $(this)).filter(':first')).trigger('focus');
        return ! ($('.error-message', $(this)).length);
    });
    $('body').delegate('form input.js-wallet-block', 'click', function() {
		var user_balance = $(this).metadata().balance;
        if (user_balance != '' && user_balance != '0.00') {
            return window.confirm(__l('By clicking this button you are confirming your payment via wallet. Once you confirmed amount will be deducted from your wallet and you cannot undo this process. Are you sure you want to confirm this action?'));
        } else if (!user_balance || user_balance == '0.00') {
            alert(__l('You don\'t have sufficent amount in wallet to continue this process. So please select any other payment gateway.'));
            return false;
        } else {
            return true;
        }
    });
    $('.js-auto-submit-paypal').each(function(){
		 $(this).submit();
    });
    /// Get the Geo City, State And Country
    if ($.cookie('ice') == null) {
        $.cookie('ice', 'true', {
            expires: 100,
            path: '/'
        });
    }
    if ($.cookie('ice') == 'true' && $.cookie('_geo') == null) {
        $.ajax( {
            type: 'GET',
            url: 'http://j.maxmind.com/app/geoip.js',
            dataType: 'script',
            cache: true,
            success: function() {
                str = geoip_country_code() + '|' + geoip_region_name() + '|' + geoip_city() + '|' + geoip_latitude() + '|' + geoip_longitude();
                $.cookie('_geo', str, {
                    expires: 100,
                    path: '/'
                });
            }
        });
    }
});
	
 
if (tout && 1)
    window._tdump = tout;
	
var geocoder;
var map;
var marker;
var markerimage;
var infowindow;
var locations;
var latlng;
// branch address add
var geocoder_branch;
var map_branch;
var marker_branch;
var latlng_branch;
function loadMap() {
    geocoder = new google.maps.Geocoder();
	if(document.getElementById('js-map-view-container')){
		map_view();
	}
    if (document.getElementById('js-map-container')) {
        lat = $('#latitude').val();
        if (lat == '') {
            lat = 0;
        }
        lng = $('#longitude').val();
        if (lng == '') {
            lng = 0;
        }
        zoom_level = parseInt($('#zoomlevel').val());
        latlng = new google.maps.LatLng(lat, lng);
        var myOptions = {
            zoom: zoom_level,
            center: latlng,
            mapTypeControl: false,
            navigationControl: true,
            navigationControlOptions: {
                style: google.maps.NavigationControlStyle.SMALL
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById('js-map-container'), myOptions);
        initMap();
    }
}
function geocodePosition(position) {
    geocoder.geocode( {
        latLng: position
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            map.setCenter(results[0].geometry.location);
            $('#latitude').val(marker.getPosition().lat());
            $('#longitude').val(marker.getPosition().lng());
        }
    });
}
function loadGeoSearch() {
    loadDoctorMap();
    var options = {
        map_frame_id: 'mapframe',
        map_window_id: 'mapwindow',
        lat_id: 'latitude',
        lng_id: 'longitude',
        lat: '28.6100',
        lng: '77.2300',
        map_zoom: 10
    }
}
function loadDoctorMap() {
	var lat = $('.js-map-data').metadata().lat;
	var lng = $('.js-map-data').metadata().lng;
	if (lat == '') {
    	lat = 0;
    }
	if (lng == '') {
		lng = 0;
    }
	if ((lat == 0 && lng == 0) || (lat == '' && lng == '')) {
            lat = 28.6100;
            lng = 77.2300;
    }
    latlng = new google.maps.LatLng(lat, lng);

	var myOptions = {
            zoom: 10,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel: false,
            streetViewControl: false,
            mapTypeControl: false
    };
    map = new google.maps.Map(document.getElementById('js-map-search-container'), myOptions);
    map.setCenter(latlng);
   
	var i = 1;
	$('a.js-map-data', document.body).each(function() {									 
        lat = $(this).metadata().lat;
        lng = $(this).metadata().lng;
		user_id = $(this).metadata().id;
		name = $(this).metadata().name;
		userimg = $(this).metadata().userimg;
		rating = $("#user-rating-"+i).html();
		usertitle = $(this).metadata().usertitle;
        address = $(this).metadata().address;
		address1 = $(this).metadata().address1;
		url = $(this).attr('href');
        title = $(this).attr('title');
		updateMarker(user_id,lat, lng, name, userimg, rating, usertitle,address,address1,url,title,i);
		$("#popupProfImg").load(function() { $(this).css('visibility', 'visible'); });
		i++;
    });
}
function updateMarker(user_id,lat, lng, name, userimg, rating, usertitle,address,address1,url,title,i) {
    var store_count = i;
    if (lat != null) {
        myLatLng = new google.maps.LatLng(lat, lng);
		var shadowimage = __cfg('path_absolute') + 'img/map/shadow.png';
		var markerShadow = new google.maps.MarkerImage(
		shadowimage,
		new google.maps.Size(37, 34),
		new google.maps.Point(0, 0),
		new google.maps.Point(9, 34));
		eval('var icon' + i + ' = CreateIcon(i, false, false);');
		var icon_obj = eval('icon' + i);
		eval('var marker' + i + ' = new google.maps.Marker({ position: myLatLng,  map: map, icon: icon' + i + ', shadow: markerShadow, zIndex: i});');
        var marker_obj = eval('marker' + i);
        marker_obj.title = title;
		eval('var icon' + i + '_h' +' = CreateIcon(i, false, false);');
		var icon_h_obj = eval('icon' + i + '_h');
        //one time map listener to handle the zoom
        google.maps.event.addListenerOnce(map, 'resize', function() {
            map.setCenter(center);
            map.setZoom(zoom);
        });
		google.maps.event.addDomListener(marker_obj, 'mouseover', function(event) {
			marker_obj.setIcon(icon_h_obj);
			$("#popupRatingImg").html('Avg Rec:&nbsp'+rating);
			href = __cfg('path_absolute') + 'users/view/'+ title;
			UpdateHoverDiv(title,userimg,true,false,usertitle,address,address1,url);
			HoverEvent(event, marker_obj, icon_h_obj);
		});
    
		google.maps.event.addDomListener(marker_obj, 'mouseout', function(event) {
			HoverOutEvent();
		});

		google.maps.event.addListener(marker_obj, 'click', function(event) {
			window.location = __cfg('path_absolute') + 'users/view/'+ title;
		});
    }
}
var hoverOutTimeoutId = null;
    var currentHighlightedMarker = null;
    var iconToUseWhenUnhilighted = null;

	
    function HideMapPopup() {
		
        $('#mapPopup').hide();
        if(currentHighlightedMarker != null) {
            currentHighlightedMarker.setIcon(iconToUseWhenUnhilighted);
        }
        currentHighlightedMarker = null;
        iconToUseWhenUnhilighted = null;
        if(hoverOutTimeoutId != null) {
            clearTimeout(hoverOutTimeoutId);
            hoverOutTimeoutId = null;
        }
    }
    
    function HoverOutEvent() {
        if(hoverOutTimeoutId == null) {
            
                hoverOutTimeoutId = setTimeout( HideMapPopup, 1000);
            
        }
    }
    
    function HoverEvent(event, marker, icon) {
        if(currentHighlightedMarker != null && marker != currentHighlightedMarker) {
            currentHighlightedMarker.setIcon(iconToUseWhenUnhilighted);
        }
    
        currentHighlightedMarker = marker;
        iconToUseWhenUnhilighted = icon;
   			googleMapOverlay = new google.maps.OverlayView();
			googleMapOverlay.draw = function() {};
			googleMapOverlay.setMap(map);     
        	
			var proj = googleMapOverlay.getProjection();
			var pos = marker.getPosition();
			var markerLoc = proj.fromLatLngToContainerPixel(pos);
            
			var markerLoc = googleMapOverlay.getProjection().fromLatLngToContainerPixel(event.latLng);
            var $mapPopup = $('#mapPopup');
            var $map = $('#js-map-search-container');
            $mapPopup.show();
            var mapContainerOffset = $map.offset();
            var popupTop = markerLoc.y + mapContainerOffset.top;
            if(markerLoc.y > $map.height() - $mapPopup.height() - 10)
                popupTop = popupTop - $mapPopup.height() - 50;
            var popupLeft = mapContainerOffset.left +
                        Math.min($map.width() - $mapPopup.width(),
                                 markerLoc.x - 12);
        
            
            $mapPopup.offset({
                top: popupTop,
                left: popupLeft 
            });
            
        
            $mapPopup.mouseout(HoverOutEvent);
            $mapPopup.mouseover(function () {
                if(hoverOutTimeoutId != null) {
                    clearTimeout(hoverOutTimeoutId);
                    hoverOutTimeoutId = null;
                }
            });
            
            if(hoverOutTimeoutId != null) {
                clearTimeout(hoverOutTimeoutId);
                hoverOutTimeoutId = null;
            }
        
    }

   var bigPinsToShow = 20;
   function CreateIcon(index, highlighted, featured) {
	   var size = new google.maps.Size(20, 34);
       var location = new google.maps.Point(20*index, (highlighted ? 34 : 0));
       var anchor = new google.maps.Point(9, 34);

        if(index > bigPinsToShow && !featured) {
            size = new google.maps.Size(11, 10);
            location = new google.maps.Point(2000, (highlighted ? 34 : 0));
            anchor = new google.maps.Point(5, 5);
        }

        if (featured){
            location = new google.maps.Point(2012, (highlighted ? 34 : 0));
        }
		var markericonimage = __cfg('path_absolute') + 'img/map/icon_sprites.png';
        return new google.maps.MarkerImage(
                        markericonimage,
                        size, location, anchor, new google.maps.Size(2032, 68));
    }

    function UpdateHoverDiv(href, imgsrc, isCProf, phoneNum, name, addr1, addr2,url) {
		if( typeof href === 'function' ) {
            $("#mapPopup a").click(function(e) {
                e.preventDefault();
                href(locId);
            });
        } 
        else {
            $("#mapPopup a").attr("href", href);
        }
        $("#popupProfImg").attr("src", __cfg('path_absolute') + 'img/place_holder.gif');
        $("#popupProfImg").css('visibility', 'hidden');
        $("#popupProfImg").attr("src", __cfg('path_absolute') + 'img/'+ imgsrc);
		$("#popupProfBookBtn").attr("href", url);
        if(isCProf) {
            $("#popupProfBookBtn").show();
        } else {
            $("#popupProfBookBtn").hide();
            $("#popupRatingImg").html("");
        }
        if(phoneNum) {
            $("#popupProfPhone").show();
            $("#popupProfPhone").html(phoneNum);
        } else {
            $("#popupProfPhone").hide();
        }
        $("#popupProfName").html(name);
        $("#popupProfAddr1").html(addr1);
        $("#popupProfAddr2").html(addr2);
    }
    
function loadCityMap() {
	lat = $('#latitude').val();
	lng = $('#longitude').val();
    if ((lat == 0 && lng == 0) || (lat == '' && lng == '')) {
            lat = 13.314082;
            lng = 77.695313;
    }
    var zoom = common_options.map_zoom;
    latlng = new google.maps.LatLng(lat, lng);
    var myOptions1 = {
        zoom: zoom,
        center: latlng,
        zoomControl: true,
        draggable: true,
        disableDefaultUI: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById('js-map-container'), myOptions1);
	marker = new google.maps.Marker( {
			draggable: true,
			map: map,
			position: latlng
	});
    map.setCenter(latlng);
	google.maps.event.addListener(marker, 'dragend', function(event) {
		geocodePosition(marker.getPosition());
	});
	google.maps.event.addListener(map, 'mouseout', function(event) {
		$('#zoomlevel').val(map.getZoom());
	});
}
function map_view(){
	lat = $('span#js-view-latitude').text();
	if(lat ==''){
		lat = 0;
	}
	lng = $('span#js-view-longitude').text();
	if(lng ==''){
		lng = 0;
	}
	zoom_level = parseInt($('span#js-view-zoom').text());
	address_info = $('span#js-view-address').text();
	avatarimg = $('span#js-view-image').text();
	username = $('span#js-view-username').text();
	latlng = new google.maps.LatLng(lat, lng);
	var map_type =  $('span#js-view-clinic').text();
	var myOptions = {
		zoom: zoom_level,
		center: latlng,
		mapTypeControl: false,
		navigationControl: true,
        draggable: true,
		disableDefaultUI:false,
		zoomControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	map = new google.maps.Map(document.getElementById('js-map-view-container'), myOptions);
	
	var imageUrl = __cfg('path_absolute') + 'img/'+ avatarimg;
	var markerimageurl = __cfg('path_absolute') + 'img/'+ 'address-icon.png';
    var markerimage = new google.maps.MarkerImage(markerimageurl);
	marker = new google.maps.Marker( {
                draggable: true,
                map: map,
                icon: markerimage,
                position: latlng
            });
	if(map_type !='clinic') {
		var content = '<div style="clear:both;height:80px;"><img style="float:left;border:1px solid #000000;margin-right:4px;" width="48" height="48" src="' + (imageUrl) + '" align="top" alt="'+username+'" /><span style="font-size:12px;font-weight:bold;">'+username+'</span><br/><span style="font-size:12px;">'+address_info+'</span></div>';
		
		infowindow = new google.maps.InfoWindow({ 
			 content: content,
			 maxWidth: 240
		});
		google.maps.event.addListener(marker, 'mouseover', function() {
				infowindow.open(map,marker);
		});
		google.maps.event.addListener(marker, 'mouseout', function() {
			infowindow.close(map,marker);
		});
	}
	map.setCenter(latlng);
}
function buildChart() {
    if ($('.js-load-line-graph', 'body').is('.js-load-line-graph')) {
        $('.js-load-line-graph').each(function() {
            data_container = $(this).metadata().data_container;
            chart_container = $(this).metadata().chart_container;
            chart_title = $(this).metadata().chart_title;
            chart_y_title = $(this).metadata().chart_y_title;
            var table = document.getElementById(data_container);
            options = {
                chart: {
                    renderTo: chart_container,
                    defaultSeriesType: 'line'
                },
                title: {
                    text: chart_title
                },
                xAxis: {
                    labels: {
                        rotation: -90
                    }
                },
                yAxis: {
                    title: {
                        text: chart_y_title
                    }
                },
                tooltip: {
                    formatter: function() {
                        return '<b>' + this.series.name + '</b><br/>' + this.y + ' ' + this.x;
                    }
                }
            };
            // the categories
            options.xAxis.categories = [];
            jQuery('tbody th', table).each(function(i) {
                options.xAxis.categories.push(this.innerHTML);
            });

            // the data series
            options.series = [];
            jQuery('tr', table).each(function(i) {
                var tr = this;
                jQuery('th, td', tr).each(function(j) {
                    if (j > 0) {
                        // skip first column
                        if (i == 0) {
                            // get the name and init the series
                            options.series[j - 1] = {
                                name: this.innerHTML,
                                data: []
                                };
                        } else {
                            // add values
                            options.series[j - 1].data.push(parseFloat(this.innerHTML));
                        }
                    }
                });
            });
            var chart = new Highcharts.Chart(options);
        });
    }
    if ($('.js-load-pie-chart', 'body').is('.js-load-pie-chart')) {
        $('.js-load-pie-chart').each(function() {
            data_container = $(this).metadata().data_container;
            chart_container = $(this).metadata().chart_container;
            chart_title = $(this).metadata().chart_title;
            chart_y_title = $(this).metadata().chart_y_title;
            var table = document.getElementById(data_container);
            options = {
                chart: {
                    renderTo: chart_container,
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: chart_title
                },
                tooltip: {
                    formatter: function() {
                        return '<b>' + this.point.name + '</b>: ' + (this.percentage).toFixed(2) + ' %';
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [ {
                    type: 'pie',
                    name: chart_y_title,
                    data: []
                    }]
                };
            options.series[0].data = [];
            jQuery('tr', table).each(function(i) {
                var tr = this;
                jQuery('th, td', tr).each(function(j) {
                    if (j == 0) {
                        options.series[0].data[i] = [];
                        options.series[0].data[i][j] = this.innerHTML
                    } else {
                        // add values
                        options.series[0].data[i][j] = parseFloat(this.innerHTML);
                    }
                });
            });
            var chart = new Highcharts.Chart(options);
        });
    }
    if ($('.js-load-column-chart', 'body').is('.js-load-column-chart')) {
        $('.js-load-column-chart').each(function() {
            data_container = $(this).metadata().data_container;
            chart_container = $(this).metadata().chart_container;
            chart_title = $(this).metadata().chart_title;
            chart_y_title = $(this).metadata().chart_y_title;
            var table = document.getElementById(data_container);
            seriesType = 'column';
            if ($(this).metadata().series_type) {
                seriesType = $(this).metadata().series_type;
            }
            options = {
                chart: {
                    renderTo: chart_container,
                    defaultSeriesType: seriesType,
                    margin: [50, 50, 100, 80]
                    },
                title: {
                    text: chart_title
                },
                xAxis: {
                    categories: [],
                    labels: {
                        rotation: -90,
                        align: 'right',
                        style: {
                            font: 'normal 13px Verdana, sans-serif'
                        }
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: chart_y_title
                    }
                },
                legend: {
                    enabled: false
                },
                tooltip: {
                    formatter: function() {
                        return '<b>' + this.x + '</b><br/>' + Highcharts.numberFormat(this.y, 1);
                    }
                },
                series: [ {
                    name: 'Data',
                    data: [],
                    dataLabels: {
                        enabled: true,
                        rotation: -90,
                        color: '#FFFFFF',
                        align: 'right',
                        x: -3,
                        y: 10,
                        formatter: function() {
                            return '';
                        },
                        style: {
                            font: 'normal 13px Verdana, sans-serif'
                        }
                    }
                }]
                };
            // the categories
            options.xAxis.categories = [];
            options.series[0].data = [];
            jQuery('tr', table).each(function(i) {
                var tr = this;
                jQuery('th, td', tr).each(function(j) {
                    if (j == 0) {
                        options.xAxis.categories.push(this.innerHTML);
                    } else {
                        // add values
                        options.series[0].data.push(parseFloat(this.innerHTML));
                    }
                });
            });
            chart = new Highcharts.Chart(options);
        });
    }
}