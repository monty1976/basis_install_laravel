
	<!-- jQuery 2.1.3 -->
        <script src="{{ asset('/plugins/jQuery/jQuery-2.1.3.min.js') }}"></script>
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
           $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>





        <script src="{{ asset('/dist/js/app.min.js') }}" type="text/javascript"></script>


        <!--Language file for the calendar-->
         <script src="{{ asset('/plugins/fullcalendar-2.3.1/lib/moment.min.js') }}" type="text/javascript"></script>
         <script src="{{ asset('/plugins/fullcalendar-2.3.1/fullcalendar.js') }}" type="text/javascript"></script>


        <script src="{{ asset('/plugins/fullcalendar/lang-all.js') }}" type="text/javascript"></script>
        <script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
             <script src="{{ asset('/plugins/datepicker/locales/bootstrap-datepicker.da.js') }}" type="text/javascript"></script>

          <!--Our  script -->

           @yield('scripts')

</body>
</html>