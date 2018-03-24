<html lang="th">
    <?php $this->renderPartial('/layouts/header'); ?>
    <body class="page1">
        <?php $this->renderPartial('/layouts/menu'); ?>
        <div class="main">
            <?php echo $content; ?>
            <?php $this->renderPartial('/layouts/footer'); ?>
        </div>
        <?php $this->renderPartial('/layouts/footer2'); ?>
        <script type="text/javascript">
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'gurugames'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var s = document.createElement('script');
                s.async = true;
                s.type = 'text/javascript';
                s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
            }());
        </script>

    </body>
</html>