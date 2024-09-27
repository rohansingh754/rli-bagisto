<template>
    <!-- welcome modal -->
    <section id="welcome-widget-model" class="welcome-widget hidden fixed left-0 right-0 z-[999] flex h-[100vh] items-center bg-[#00000060] pt-[26px] transition-all">
        <div class="rounded-[28px] bg-white px-4 py-[25px]">
            <h2 class="text-center text-[20px] font-bold text-dark">Welcome to Homeful</h2>
            <img :src="themeAssets + 'images/about-homeful.png'" alt="About Homeful" class="mt-6 w-[100%] rounded-[20px]">
            <p class="mt-6 text-[15px] font-normal text-dark">
                HOMEFUL is an e-commerce platform featuring real estate projects in both Northern & Southern Luzon.<br><br>
                We showcase diverse range of properties from developer Raemulan Lands Inc.
            </p>
            <div class="mt-[29px] flex items-center justify-between gap-[2px]">
                <a href="#" class="welcome-modal-close inline-block w-[48%] rounded-full px-[30px] py-[15px] text-center text-[14px] font-normal text-primary underline" @click="close()" >Close</a>
                <a href="./home.html#about" class="inline-block w-[48%] rounded-full bg-[linear-gradient(268.1deg,_#CC035C_7.47%,_#FCB115_98.92%)] px-[30px] py-[15px] text-center text-[14px] font-normal text-white">Read More</a>
            </div>
        </div>
    </section>
    <!-- welcome modal end-->
</template>

<script>
    export default {
        name: 'welcome-model',

        data: function () {
			return {
                themeAssets: window.config.themeAssetsPath,
			}
        },

        methods: {
            close () {
                let element = document.getElementById('welcome-widget-model');
                element.style.transform = 'translate3d(0, 900px ,0)';
				element.style.transitionDuration = '0.3s';

                setTimeout(() => {
				    element.classList.add('hidden');
                }, 400);
            }
        }
    }
</script>
