    <!--<script src="js/vendor/jquery.js"></script>-->
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.reveal.js"></script>
    <script src="js/foundation-datepicker.js"></script>
    
    <script type="text/javascript" src="js/date.js"></script>
    <script type="text/javascript" src="js/foundation_calendar.js"></script>
    <script type="text/javascript" src="js/date-helpers.js"></script>
    <script type="text/javascript" src="js/string-helpers.js"></script>
    <script>
      $(document).ready(function() {
          $(document).foundation();

          // Hack to get off-canvas .menu-icon to fire on iOS
          $('.menu-icon').click(function(){ false });
      });
    </script>
  </body>
</html>
