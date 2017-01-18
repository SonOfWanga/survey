<!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="{{ url('') }}">Survey - by BLUEBRICK LTD</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      <!-- </div>
    </div> -->
   <!--  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script type="text/javascript" src="{{ url('/')}}/assets/javascripts/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/assets/javascripts/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/assets/javascripts/fastclick.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/assets/javascripts/daterangepicker.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/assets/javascripts/nprogress.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/assets/javascripts/jquery.smartWizard.js"></script>
    <script type="text/javascript" src="{{ url('/')}}/assets/javascripts/custom.min.js"></script>
    <script>
      // initialize the validator function
      // validator.message.date = 'not a real date';

      // // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      // $('form')
      //   .on('blur', 'input[required], input.optional, select.required', validator.checkField)
      //   .on('change', 'select.required', validator.checkField)
      //   .on('keypress', 'input[required][pattern]', validator.keypress);

      // $('.multi.required').on('keyup blur', 'input', function() {
      //   validator.checkField.apply($(this).siblings().last()[0]);
      // });

      // $('form').submit(function(e) {
      //   e.preventDefault();
      //   var submit = true;

      //   // evaluate the form using generic validaing
      //   if (!validator.checkAll($(this))) {
      //     submit = false;
      //   }

      //   if (submit)
      //     this.submit();

      //   return false;
      // });
    </script>
    <script>
      $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
          transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
      });
    </script>
  </body>
</html>
