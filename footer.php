    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.reveal.js"></script>
    <script>
      $(document).ready(function() {
          $(document).foundation();

          // Hack to get off-canvas .menu-icon to fire on iOS
          $('.menu-icon').click(function(){ false });
      });
    </script>
    <script src="js/jquery.datetimepicker.js"></script>
  </body>
</html>
