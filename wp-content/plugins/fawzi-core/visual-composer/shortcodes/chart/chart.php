<?php
/* ==========================================================
  Client Carousel
=========================================================== */
if ( !function_exists('fwzi_chart_func')) {
  function fwzi_chart_func( $atts, $content = NULL ) {

    extract(shortcode_atts(array(
      // Types
      'chart_type'  => '',
      'horizontal_bar'  => '',
      'opt_legend'  => '',
      'opt_legend_pos'  => '',
      // Height
      'canvas_width'  => '',
      'canvas_height'  => '',
      // Chart Values
      'x_values'    => 'January; February; March; April; May; June',
      'max_value'   => '100',
      'min_value'   => '20',
      'step_value'  => '20',
      'hidex_gridlines'  => '',
      'hidey_gridlines'  => '',
      // Param Group
      'line_values'  => '',
      'circle_values'  => '',
      // Custom Class
      'class'  => '',
      // Design
      'css' => ''
    ), $atts));

    // Design Tab
    $custom_css = ( function_exists( 'vc_shortcode_custom_css_class' ) ) ? vc_shortcode_custom_css_class( $css, ' ' ) : '';

    // Atts
    $chart_type = $chart_type ? $chart_type : 'line';
    $canvas_width = $canvas_width ? $canvas_width : '';
    $canvas_height = $canvas_height ? $canvas_height : '';
    if ($chart_type === 'bar') {
      if ($horizontal_bar) {
        $chart_type = 'horizontalBar';
      } else {
        $chart_type = 'bar';
      }
    } else {
      $horizontal_bar = $chart_type;
    }

    // Unique ID
    $chart_uniqid   = uniqid( 'chart_' );
    $inline_style  = '';

    // Width & Height
    if ( $canvas_height || $canvas_width ) {
      $inline_style .= '.fawzi-'. $chart_uniqid .'.fwzi-chart {';
      $inline_style .= ( $canvas_width ) ? 'width:'. fawzi_core_check_px($canvas_width) .';' : '';
      $inline_style .= ( $canvas_height ) ? 'height:'. fawzi_core_check_px($canvas_height) .';' : '';
      $inline_style .= '}';
    }

    // add inline style
    add_inline_style( $inline_style );
    $styled_class  = ' fawzi-'. $chart_uniqid;

    // X Values
    $x_values = explode( ';', trim( $x_values, ';' ) );

    // Param Group Values
    $line_values    = (array) vc_param_group_parse_atts( $line_values );
    $circle_values  = (array) vc_param_group_parse_atts( $circle_values );

    // Get Values
    $data = array(
      'labels'   => $x_values,
      'datasets' => array()
    );

    // Chart Datasets
    if ( $chart_type !== 'doughnut' || $chart_type !== 'pie' || $chart_type !== 'polarArea' ) {
      foreach ( $line_values as $value ) {
        $color = isset( $value['color'] ) ? $value['color'] : '';
        $point_color = isset( $value['point_color'] ) ? $value['point_color'] : '';
        $border_color = isset( $value['border_color'] ) ? $value['border_color'] : '';
        $point_border_color = isset( $value['point_border_color'] ) ? $value['point_border_color'] : '';
        $opt_mixed = isset( $value['opt_mixed'] ) ? $value['opt_mixed'] : '';        

        $data['datasets'][] = array(
          'label'                 => isset( $value['title'] ) ? $value['title'] : '',
          'data'                  => explode( ';', isset( $value['y_values'] ) ? trim( $value['y_values'], ';' ) : '' ),
          'borderColor'           => $border_color,
          'pointBorderColor'      => $point_border_color,
          'pointBackgroundColor'  => $point_color,
          'backgroundColor'       => $color,
          'borderWidth'           => isset( $value['border_width'] ) ? $value['border_width'] : '1',
          'pointBorderWidth'      => isset( $value['point_width'] ) ? $value['point_width'] : '2',
          'pointRadius'           => isset( $value['point_radius'] ) ? $value['point_radius'] : '4',
          'pointHoverRadius'      => isset( $value['point_hover_radius'] ) ? $value['point_hover_radius'] : '4',
          'lineTension'           => '0',
          'type'                  => $opt_mixed,
        );

      }
    }

    // Turn output buffer on
    ob_start();

    echo '<div class="fwzi-chart '. $styled_class .' '. $custom_css .' '. $class .'">';
    echo '<canvas id="'. $chart_uniqid .'" height="'. $canvas_height .'" width="'. $canvas_width .'"></canvas>';
    echo '</div>';

    wp_enqueue_script( 'vtheme-chartjs', FAWZI_PLUGIN_ASTS . '/Chart.min.js', array( 'jquery' ), '2.2.1', true );

  ?>
  <script type="text/javascript">

    jQuery(window).on('load', function ($) {

      // Global configs
      Chart.defaults.global.responsive = true;
      Chart.defaults.global.maintainAspectRatio = false;
      Chart.defaults.global.legend.display = <?php echo json_encode($opt_legend); ?>;
      Chart.defaults.global.legend.position = <?php echo json_encode($opt_legend_pos); ?>;
      Chart.defaults.global.tooltips.backgroundColor = 'rgba(35,35,35,0.9)';
      Chart.defaults.global.tooltips.bodyFontSize = 13;
      Chart.defaults.global.tooltips.bodyFontStyle = 'bold';
      Chart.defaults.global.tooltips.yPadding = 13;
      Chart.defaults.global.tooltips.xPadding = 10;
      Chart.defaults.doughnut.cutoutPercentage = 60;

      // Line Chart
      var <?php echo esc_js( $chart_uniqid ); ?> = document.getElementById("<?php echo esc_js( $chart_uniqid ); ?>").getContext("2d");

      var <?php echo esc_js( $chart_uniqid ); ?>_myChart = new Chart(<?php echo esc_js( $chart_uniqid ); ?>, {
        type: '<?php echo esc_js( $chart_type ); ?>',
        <?php if ( $chart_type === 'doughnut' || $chart_type === 'pie' || $chart_type === 'polarArea' ) { ?>
          data: {
            labels: [
              <?php foreach ( $circle_values as $value ) { ?>
              "<?php echo esc_js($value['title']); ?>",
              <?php } ?>
            ],
            datasets: [
              {
                data: [
                  <?php foreach ( $circle_values as $value ) { ?>
                  <?php echo esc_js($value['values']); ?>,
                  <?php } ?>
                ],
                backgroundColor: [
                  <?php foreach ( $circle_values as $value ) { ?>
                  "<?php echo esc_js($value['color']); ?>",
                  <?php } ?>
                ],
                borderWidth: [4, 4, 4]
              }
            ]
          },
        <?php
        } else { ?>
          data: <?php echo json_encode( $data ); ?>,
        <?php }
        if ( $chart_type === 'line' || $chart_type === 'bar' || $chart_type === 'horizontalBar' ) {
        ?>
        options: {
        responsive: true,
          scales: {
            yAxes: [{
              <?php if ($chart_type !== 'horizontalBar' || $chart_type === 'bar' || $chart_type === 'line') { ?>
              ticks: {
                max: <?php echo esc_js($max_value); ?>,
                min: <?php echo esc_js($min_value); ?>,
                stepSize: <?php echo esc_js($step_value); ?>,
                stacked: true,
              },
              <?php } if ($hidey_gridlines) { ?>
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
                <?php if ($chart_type === 'bar') { ?>
                zeroLineColor: 'rgba(0, 0, 0, 0)',
                <?php } ?>
              }
              <?php } ?>
            }],
            xAxes: [{
              <?php if ($chart_type === 'horizontalBar' && $horizontal_bar) { ?>
                ticks: {
                  max: <?php echo esc_js($max_value); ?>,
                  min: <?php echo esc_js($min_value); ?>,
                  stepSize: <?php echo esc_js($step_value); ?>,
                  stacked: true,
                },
              <?php }
              if ($hidex_gridlines) { ?>
              gridLines: {
                color: "rgba(0, 0, 0, 0)",
                zeroLineColor: 'rgba(0, 0, 0, 0)',
              }
              <?php } ?>
            }],
          }
        }
        <?php } ?>
      });

    });
  </script>
  <?php

    // Return outbut buffer
    return ob_get_clean();

  }
}
add_shortcode( 'fwzi_chart', 'fwzi_chart_func' );
