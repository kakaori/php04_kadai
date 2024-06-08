<?php $title = 'G’s ACADEMY LAB17 GEEK日記'; ?>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/header.php'); ?>

<div class="mx-auto max-w-screen-2xl px-4 md:px-8">

    <section class="mx-auto max-w-screen-md relative flex flex-1 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-gray-100 py-16 shadow-lg md:py-20">
        <!-- image - start -->
        <img src="https://images.unsplash.com/photo-1618004652321-13a63e576b80?auto=format&q=75&fit=crop&w=1500" loading="lazy" alt="Photo by Fakurian Design" class="absolute inset-0 h-full w-full object-cover object-center" />
        <!-- image - end -->

        <!-- overlay - start -->
        <div class="absolute inset-0 bg-sky-500 mix-blend-multiply"></div>
        <!-- overlay - end -->

        <!-- text start -->
        <div class="relative flex flex-col items-center p-4 sm:max-w-xl">
            <p class="mb-4 text-center text-lg text-white sm:text-xl md:mb-8">G’s ACADEMY LAB17専用</p>
            <h1 class="text-center text-4xl font-bold text-white sm:text-5xl md:text-6xl" style="letter-spacing: 1rem;">GEEK<span class="text-4xl sm:text-4xl md:text-5xl">日記</span></h1>

            <?php if ($loggedIn): ?>
            <div class="txt-center mt-8 md:mt-12">
                <a href="/gs_php/php04/kadai/diary/" class="inline-block rounded-full shadow-md bg-sky-50 px-8 py-3 text-center text-sm font-semibold text-sky-700 outline-none ring-sky-200 transition duration-100 hover:bg-sky-200 focus-visible:ring active:bg-sky-300 md:text-base">日記を書く</a>
            </div>
            <?php endif; ?>
        </div>
        <!-- text end -->
    </section>
    
    <div><img class="m-auto mt-8 w-full max-w-screen-md" src="/gs_php/php04/kadai/img/gs_credo.png" alt=""></div>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/gs_php/php04/kadai/inc/footer.php'); ?>