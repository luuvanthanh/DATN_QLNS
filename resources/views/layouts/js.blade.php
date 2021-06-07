{{-- declare all file script use global --}}
<!-- jQuery -->
<script src="/plugins/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{-- ---------hightchart--------------- --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/adminlte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/adminlte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/adminlte/plugins/moment/moment.min.js"></script>
<script src="/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminlte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/adminlte/dist/js/pages/dashboard.js"></script>

<script src="/adminlte/plugins/jquery-ui/jquery-ui.js"></script>
<script src="/adminlte/dist/js/myscript.js"></script>
<script src="/adminlte/plugins/jquery-ui/jquery-1.12.4.js"></script>

{{-- nen viet ajax danh rieng cho tung page
vd nhu nhan vie n ajax 
thi tao ra file employee_ajax.js --}}
{{-- va cu o noi nao can su dung AJAX thi khai bao duong dan nay vao da --}}



{{-- declare other file script use private --}}
@stack('js')


{{-- ---------hightchart--------------- --}}
{{-- <script>
  const chart = Highcharts.chart('container', {
      title: {
          text: 'Biểu đồ thống kê nhân sự'
      },
      subtitle: {
          text: 'Plain'
      },
      xAxis: {
          categories: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12']
      },
      series: [{
          type: 'column',
          colorByPoint: true,
          data: [1, 5, 7, 3, 1, 5, 4, 6, 0, 4, 4, 3],
          showInLegend: false
      }]
  });

  document.getElementById('plain').addEventListener('click', () => {
      chart.update({
          chart: {
              inverted: false,
              polar: false
          },
          subtitle: {
              text: 'Plain'
          }
      });
  });

  document.getElementById('inverted').addEventListener('click', () => {
      chart.update({
          chart: {
              inverted: true,
              polar: false
          },
          subtitle: {
              text: 'Inverted'
          }
      });
  });

  document.getElementById('polar').addEventListener('click', () => {
      chart.update({
          chart: {
              inverted: false,
              polar: true
          },
          subtitle: {
              text: 'Polar'
          }
      });
  });

</script> --}}
