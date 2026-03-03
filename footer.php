<?php
    /**
     * footer for wp-jtiong
     * @package wp-jtiong
     * @since 1.0.0
     */
?>
    <footer class="footer py-5 mt-5 border-top border-light border-opacity-50">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <small class="text-secondary">
                        Made with <span class="text-danger"><i class="bi-heart-fill"></i></span> by JT
                        <br />
                        <sub>Copyright &copy; Johnathan Tiong, 2022 &rarr; <?=date('Y')?>. All Rights Reserved.</sub>
                    </small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="/public/js/app.js?<?=uniqid()?>"></script>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3106157556180197" crossorigin="anonymous"></script>

<?php wp_footer(); ?>

</body>

</html>