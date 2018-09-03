! function() {
    function a(a, t) {
        t = t || {
            bubbles: !1,
            cancelable: !1,
            detail: void 0
        };
        var n = document.createEvent("CustomEvent");
        return n.initCustomEvent(a, t.bubbles, t.cancelable, t.detail), n
    }
    return "function" != typeof window.CustomEvent && (console.log("hi"), a.prototype = window.Event.prototype, void(window.CustomEvent = a))
}();
var MalinkyAjaxPaging = function($) {
  var init = function(mapVars) {
    function debounce(a, t, n) {
        var o;
        return function() {
            var i = this,
                e = arguments,
                p = function() {
                    o = null, n || a.apply(i, e)
                },
                m = n && !o;
            clearTimeout(o), o = setTimeout(p, t), m && a.apply(i, e)
        }
    }
    var mymapAjaxLoader = mapVars.mapAjaxLoader,
        mymapCssLoadMore = mapVars.mapCssLoadMore,
        mymapCssLoadMoreButton = mapVars.mapCssLoadMoreButton,
        mymapInfiniteScrollBuffer = mapVars.mapInfiniteScrollBuffer,
        mymapLoadingTimer = "",
        mymapLoadingMorePostsText = mapVars.mapLoadingMorePostsText,
        mymapLoadMoreButtonText = mapVars.mapLoadMoreButtonText,
        mymapPaginationClass = mapVars.mapPaginationClass,
        mymapPaginationClassPixelsToDocBottom = mapVars.mapPaginationClassPixelsToDocBottom,
        mymapPagingType = mapVars.mapPagingType,
        mymapPostsWrapperClass = mapVars.mapPostsWrapperClass,
        mymapPostClass = mapVars.mapPostClass,
        mymapNextPageSelector = mapVars.mapNextPageSelector,
        mymapNextPageUrl = mapVars.mapNextPageUrl,
        mymapPaginatorCount = mapVars.mapPaginatorCount,
        infiniteScrollRunning = !1,
    mapLoadPosts = function() {
      $.ajax({
        type: "GET",
        url: mymapNextPageUrl,
        dataType: "html",
        beforeSend: function() {

            var $grid = $('.fwzi-masonry').isotope ({
              itemSelector: '.masonry-item',
              layoutMode: 'packery',
            });
            $(".project-item .fwzi-image img").lazyload();
            var filterFns = {
              ium: function() {
                var name = $(this).find('.name').text();
                return name.match( /ium$/ );
              }
            };
            $('.masonry-filters').on( 'click', 'a', function() {
              var filterValue = $( this ).attr('data-filter');
              filterValue = filterFns[ filterValue ] || filterValue;
              $grid.isotope({
                filter: filterValue
              });
            });
            $('.masonry-filters').each( function( i, buttonGroup ) {
              var $buttonGroup = $( buttonGroup );
              $buttonGroup.on( 'click', 'a', function() {
                $buttonGroup.find('.active').removeClass('active');
                $(this).addClass('active');
              });
            });
            
            var a = new CustomEvent("malinkyLoadPostsStart");
            document.dispatchEvent(a)
        },       
        success: function(a) {

          var $grid = $('.fwzi-masonry').isotope ({
            itemSelector: '.masonry-item',
            layoutMode: 'packery',
          });
          $(".project-item .fwzi-image img").lazyload();
          var filterFns = {
            ium: function() {
              var name = $(this).find('.name').text();
              return name.match( /ium$/ );
            }
          };
          $('.masonry-filters').on( 'click', 'a', function() {
            var filterValue = $( this ).attr('data-filter');
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({
              filter: filterValue
            });
          });
          $('.masonry-filters').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'a', function() {
              $buttonGroup.find('.active').removeClass('active');
              $(this).addClass('active');
            });
          });

            var t = $.parseHTML(a),
                n = ($(t).find(mymapPostsWrapperClass), mapPaginatorTotalCount(t));
            mapAddPaginatorCount(t, n);
            var o = $(t).find(mymapPostsWrapperClass + '[data-paginator-count="' + mymapPaginatorCount + '"] ' + mymapPostClass),
                i = $(mymapPostsWrapperClass + '[data-paginator-count="' + mymapPaginatorCount + '"] ' + mymapPostClass).last(),
                e = $(mymapPostsWrapperClass + '[data-paginator-count="' + mymapPaginatorCount + '"] ' + mymapPostClass);
            if (i.after(o), "infinite-scroll" != mymapPagingType && "load-more" != mymapPagingType || (1 == n ? mapIsLastPage(t, mymapNextPageSelector) ? mymapNextPageUrl = $(t).find(mymapNextPageSelector).attr("href") : ($('#malinky-ajax-pagination-button[data-paginator-count="' + mymapPaginatorCount + '"]').parent().remove(), window.removeEventListener("scroll", mapInfiniteScroll)) : mapIsLastPage(t, mymapNextPageSelector + '[data-paginator-count="' + mymapPaginatorCount + '"]') ? mymapNextPageUrl = $(t).find(mymapNextPageSelector + '[data-paginator-count="' + mymapPaginatorCount + '"]').attr("href") : ($('#malinky-ajax-pagination-button[data-paginator-count="' + mymapPaginatorCount + '"]').parent().remove(), window.removeEventListener("scroll", mapInfiniteScroll))), "pagination" == mymapPagingType) {
                e.remove(), history.pushState(null, null, mymapNextPageUrl);
                var p = $(t).find(mymapPaginationClass + '[data-paginator-count="' + mymapPaginatorCount + '"]').first();
                $(mymapPaginationClass + '[data-paginator-count="' + mymapPaginatorCount + '"]').replaceWith(p)
            }
            mapLoaded()
        },
        error: function(a, t) {
            mapFailed()
        },
        complete: function(requestObj) {

          var $grid = $('.fwzi-masonry').isotope ({
            itemSelector: '.masonry-item',
            layoutMode: 'packery',
          });
          $(".project-item .fwzi-image img").lazyload();
          var filterFns = {
            ium: function() {
              var name = $(this).find('.name').text();
              return name.match( /ium$/ );
            }
          };
          $('.masonry-filters').on( 'click', 'a', function() {
            var filterValue = $( this ).attr('data-filter');
            filterValue = filterFns[ filterValue ] || filterValue;
            $grid.isotope({
              filter: filterValue
            });
          });
          $('.masonry-filters').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'a', function() {
              $buttonGroup.find('.active').removeClass('active');
              $(this).addClass('active');
            });
          });

            var malinkyloadPostsCompleteEvent = new CustomEvent("malinkyLoadPostsComplete");
            document.dispatchEvent(malinkyloadPostsCompleteEvent), "pagination" == mymapPagingType && $("body,html").animate({
                scrollTop: $(mymapPostsWrapperClass + '[data-paginator-count="' + mymapPaginatorCount + '"]').offset().top - 150
            }, 400), "infinite-scroll" == mymapPagingType && (infiniteScrollRunning = !1), "load-more" == mymapPagingType && $('#malinky-ajax-pagination-button[data-paginator-count="' + mymapPaginatorCount + '"]').removeClass("malinky-load-more__button-disable");
            var mapResponse = $.parseHTML(requestObj.responseText),
                paginatorTotalCountAjax = mapPaginatorTotalCount(mapResponse);
            mapAddPaginatorCount(mapResponse, paginatorTotalCountAjax);
            var $mapLoadedPosts = $(mapResponse).find(mymapPostsWrapperClass + '[data-paginator-count="' + mymapPaginatorCount + '"] ' + mymapPostClass);
            ! function(loadedPosts, url) {

                // Fawzi Load More Callback Function
                $('.fwzi-masonry').isotope('reloadItems').isotope();
                setTimeout(function(){
                    //Fwzi Popup Picture Script
                    $('.popup-image').magnificPopup ({
                      delegate: 'a',
                      type: 'image',
                      closeOnContentClick: false,
                      closeBtnInside: false,
                      mainClass: 'mfp-with-zoom mfp-img-mobile',
                      closeMarkup:'<div class="mfp-close" title="%title%"></div>',
                      image: {
                        verticalFit: true,
                        titleSrc: function(item) {
                          return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                        }
                      },
                      gallery: {
                        enabled: true,
                        arrowMarkup:'<div title="%title%" class="mfp-arrow mfp-arrow-%dir%"></div>',
                      },
                    });
                    //Fwzi Popup Video Script
                    $('.popup-video').magnificPopup ({
                      mainClass: 'mfp-fade',
                      type: 'iframe',
                      closeMarkup:'<div class="mfp-close" title="%title%"></div>',
                      iframe: {
                        patterns: {
                          youtube: {
                            index: 'youtube.com/', 
                            id: function(url) {        
                              var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
                              if ( !m || !m[1] ) return null;
                              return m[1];
                            },
                            src: 'https://www.youtube.com/embed/%id%?autoplay=1'
                          },
                          vimeo: {
                            index: 'vimeo.com/', 
                            id: function(url) {        
                              var m = url.match(/(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/);
                              if ( !m || !m[5] ) return null;
                              return m[5];
                            },
                            src: 'https://player.vimeo.com/video/%id%?autoplay=1'
                          }
                        }
                      }
                    });
                    // zilla Likes
                    $('.zilla-likes').on('click', function() {
                    var link = $(this);
                    if (link.hasClass('active')) return false;

                    var id = $(this).attr('id'),
                        postfix = link.find('.zilla-likes-postfix').text();

                    $.ajax({
                      type: 'POST',
                      url: zilla_likes.ajaxurl,
                      data: {
                        action: 'zilla-likes',
                        likes_id: id,
                        postfix: postfix,
                      },
                      xhrFields: {
                        withCredentials: true,
                      },
                      success: function(data) {
                        link.html(data).addClass('active').attr('title','You already like this');
                      },
                    });

                    return false;
                    });

                    if ($('body.ajax-zilla-likes').length) {
                      $('.zilla-likes').each(function() {
                        var id = $(this).attr('id');
                        $(this).load(zilla_likes.ajaxurl, {
                          action: 'zilla-likes',
                          post_id: id,
                        });
                      });
                    }
                    //Fwzi Min Height
                    $(window).load(function() {
                      var maxheight = 0;
                      $('.books-item').each(function () {
                        maxheight = ($(this).height() > maxheight ? $(this).height() : maxheight);
                      });
                      $('.books-item').height(maxheight);
                    });
                    //Fwzi Hover Script
                    $('.project-item, .plan-item, .blog-item, .service-item, .member-item, .fwzi-difference').hover (
                      function() {
                        $(this).addClass('fwzi-hover');
                      },
                      function() {
                        $(this).removeClass('fwzi-hover');
                      }
                    );
                    var $grid = $('.fwzi-masonry').isotope ({
                      itemSelector: '.masonry-item',
                      layoutMode: 'packery',
                    });
                    $(".project-item .fwzi-image img").lazyload();
                    var filterFns = {
                      ium: function() {
                        var name = $(this).find('.name').text();
                        return name.match( /ium$/ );
                      }
                    };
                    $('.masonry-filters').on( 'click', 'a', function() {
                      var filterValue = $( this ).attr('data-filter');
                      filterValue = filterFns[ filterValue ] || filterValue;
                      $grid.isotope({
                        filter: filterValue
                      });
                    });
                    $('.masonry-filters').each( function( i, buttonGroup ) {
                      var $buttonGroup = $( buttonGroup );
                      $buttonGroup.on( 'click', 'a', function() {
                        $buttonGroup.find('.active').removeClass('active');
                        $(this).addClass('active');
                      });
                    });
                }, 100);
                $('.blog-items-wrap').append();
                // Fawzi Load More Callback Function

            }($mapLoadedPosts, this.url)
        }
      })
    },
    mapPaginatorTotalCount = function(a) {
      $('.fwzi-post-load-more').each( function() {
        var $paging = $(this);
        var posts_select = ($paging.data('select') !== undefined) ? $paging.data('select') : '.blog-items-wrap';
        var post_item = ($paging.data('item') !== undefined) ? $paging.data('item') : '.blog-item';
        var posts_wrapper = posts_select;
        var post_wrapper = post_item;
        var pagination_wrapper = '.fwzi-pagenavi';
        var next_page_selector = '.fwzi-pagenavi .next';
        var t = 0;
        for (var n in malinkySettings) $(a).find(posts_wrapper).length && $(a).find(post_wrapper).length && $(a).find(pagination_wrapper).length && t++;
        return t
      });
    },
    mapAddPaginatorCount = function(a, t) {
      $('.fwzi-post-load-more').each( function() {
        var $paging = $(this);
        var posts_select = ($paging.data('select') !== undefined) ? $paging.data('select') : '.blog-items-wrap';
        var post_item = ($paging.data('item') !== undefined) ? $paging.data('item') : '.blog-item';
        var posts_wrapper = posts_select;
        var post_wrapper = post_item;
        var pagination_wrapper = '.fwzi-pagenavi';
        var next_page_selector = '.fwzi-pagenavi .next';
        var n = 1;
        for (var o in malinkySettings) $(a).find(posts_wrapper).length && $(a).find(post_wrapper).length && $(a).find(pagination_wrapper).length && (1 == t ? ($(a).find(posts_wrapper).attr("data-paginator-count", n), $(a).find(pagination_wrapper).attr("data-paginator-count", n)) : ($(a).find(posts_wrapper).attr("data-paginator-count", n), $(a).find(posts_wrapper + " " + pagination_wrapper).attr("data-paginator-count", n), $(a).find(posts_wrapper + " " + next_page_selector).attr("data-paginator-count", n), n++))
      });
    },
    mapIsLastPage = function(a, t) {
      return $(a).find(t).length
    },
    mapAddLoader = function() {
      $(mymapPaginationClass + '[data-paginator-count="' + mymapPaginatorCount + '"]').last().before('<div class="malinky-ajax-pagination-loading" data-paginator-count="' + mymapPaginatorCount + '">' + mymapAjaxLoader + "</div>")
    },
    mapLoading = function() {
      $('.fwzi-post-load-more').each( function() {
        $('.malinky-load-more__button').hide();
        $('.malinky-ajax-pagination-loading[data-paginator-count="' + mymapPaginatorCount + '"]').show();
      });
      $('.fwzi-preloader').show();
      $('.loader-icon').addClass('fa-spin');
      $('.malinky-load-more__icon').addClass('fa-spin');
    },
    mapLoaded = function() {
      $('.fwzi-post-load-more').each( function() {
        $('.malinky-load-more__button').show();
      });
      $('.fwzi-preloader').hide();
      $('.loader-icon').removeClass('fa-spin');
      $('.malinky-load-more__icon').removeClass('fa-spin');
      $('.malinky-ajax-pagination-loading[data-paginator-count="' + mymapPaginatorCount + '"]').hide(),clearTimeout(mymapLoadingTimer);
    },
    mapFailed = function() {
      $('.fwzi-post-load-more').each( function() {
        $('.malinky-load-more__button').show();
      });
      $('.fwzi-preloader').hide();
      $('.loader-icon').removeClass('fa-spin');
      $('.malinky-load-more__icon').removeClass('fa-spin');
      $('.malinky-ajax-pagination-loading[data-paginator-count="' + mymapPaginatorCount + '"]').hide(),clearTimeout(mymapLoadingTimer);
    },
    mapInfiniteScroll = debounce(function() {
      if (!infiniteScrollRunning) {
        var a = ($(document).height() - $(window).scrollTop() - $(window).height(), $(mymapPostsWrapperClass + '[data-paginator-count="' + mymapPaginatorCount + '"]').offset().top),
            t = $(mymapPostsWrapperClass + '[data-paginator-count="' + mymapPaginatorCount + '"]').outerHeight();
        $(window).height() + $(window).scrollTop() + mymapInfiniteScrollBuffer > a + t && (infiniteScrollRunning = !0, mapLoading(), mapLoadPosts())
      }
    }, 250);
    $('.fwzi-post-load-more').each( function() {
    var $paging = $(this);
      $btn_type = mymapLoadMoreButtonText;
      $btn_cls = 'malinky-load-more__button fwzi-btn';
    });
    "infinite-scroll" == mymapPagingType ? $(mymapNextPageSelector + '[data-paginator-count="' + mymapPaginatorCount + '"]').attr("href") && (mapAddLoader(), $(mymapPaginationClass + '[data-paginator-count="' + mymapPaginatorCount + '"]').remove(), window.addEventListener("scroll", mapInfiniteScroll)) : "load-more" == mymapPagingType ? $(mymapNextPageSelector + '[data-paginator-count="' + mymapPaginatorCount + '"]').attr("href") && ($(mymapPaginationClass + '[data-paginator-count="' + mymapPaginatorCount + '"]').last().after('<div class="malinky-load-more"><a href="' + mymapNextPageUrl + '" id="malinky-ajax-pagination-button" class="'+ $btn_cls +'" data-paginator-count="' + mymapPaginatorCount + '">' + $btn_type + "</a></div>"), mapAddLoader(), $(mymapPaginationClass + '[data-paginator-count="' + mymapPaginatorCount + '"]:not(:has(>a#malinky-ajax-pagination-button[data-paginator-count="' + mymapPaginatorCount + '"]))').remove(), $('#malinky-ajax-pagination-button[data-paginator-count="' + mymapPaginatorCount + '"]').click(function(a) {
      a.preventDefault(), $(this).addClass("malinky-load-more__button-disable"), mymapLoadingTimer = setTimeout(mapLoading, 750), mapLoadPosts()
    })) : "pagination" == mymapPagingType && (mapAddLoader(), $(document).on("click", mymapPaginationClass + '[data-paginator-count="' + mymapPaginatorCount + '"] a', function(a) {
      a.preventDefault(), mymapLoadingTimer = setTimeout(mapLoading, 750), mymapNextPageUrl = a.currentTarget.href, mapLoadPosts()
    }), window.addEventListener("popstate", function(a) {
      mymapNextPageUrl = document.URL, mapLoadPosts()
    }))
  },
  setUp = function() {
    $('.fwzi-post-load-more').each( function() {
        var $paging = $(this);
        var posts_select = ($paging.data('select') !== undefined) ? $paging.data('select') : '.blog-items-wrap';
        var post_item = ($paging.data('item') !== undefined) ? $paging.data('item') : '.blog-item';
        var posts_wrapper = posts_select;
        var post_wrapper = post_item;
        var pagination_wrapper = '.fwzi-pagenavi';
        var next_page_selector = '.fwzi-pagenavi .next';

      var a = 0,
          t = 1,
          n = 0;
      for (var o in malinkySettings) $(posts_wrapper).length && $(post_wrapper).length && $(pagination_wrapper).length && $(next_page_selector).length && n++;
      for (var o in malinkySettings)
        if ($(posts_wrapper).length && $(post_wrapper).length && $(pagination_wrapper).length && $(next_page_selector).length) {
          1 == n ? ($(posts_wrapper).attr("data-paginator-count", t), $(pagination_wrapper).attr("data-paginator-count", t), $(next_page_selector).attr("data-paginator-count", t)) : ($(posts_wrapper).attr("data-paginator-count", t), $(posts_wrapper + " " + pagination_wrapper).attr("data-paginator-count", t), $(posts_wrapper + " " + next_page_selector).attr("data-paginator-count", t), t++);

          var paging_type = ($paging.data('paging') !== undefined) ? $paging.data('paging') : 'load-more';
          var load_txt = ($paging.data('loading') !== undefined) ? $paging.data('loading') : 'Load More';
          var i = {
            mapAjaxLoader: malinkySettings[o].ajax_loader,
            mapInfiniteScrollBuffer: 20,
            mapLoadingTimer: "",
            mapLoadingMorePostsText: malinkySettings[o].loading_more_posts_text,
            mapLoadMoreButtonText: load_txt,
            mapPaginationClass: pagination_wrapper,
            mapPagingType: paging_type,
            mapPostsWrapperClass: posts_wrapper,
            mapPostClass: post_wrapper,
            mapNextPageSelector: next_page_selector,
            mapPaginatorCount: ++a,
          };
          i.mapPaginationClassPixelsToDocBottom = jQuery(document).height() - jQuery(i.mapPaginationClass).offset().top, 1 == n ? i.mapNextPageUrl = $(next_page_selector).attr("href") : i.mapNextPageUrl = $(posts_wrapper + " " + next_page_selector).attr("href"), init(i);
          var e = new CustomEvent("malinkyPaginationInitialized");
          document.dispatchEvent(e)
        }
    });
  };
  return setUp(), {
      setUp: setUp
  }
}(jQuery);