<template>
    <div>
        <!-- welcome modal -->
        <section v-if="welcomeModal" class="welcome-widget fixed left-0 right-0 z-[999] flex h-[100vh] items-center bg-[#00000060] pt-[26px] transition-all">
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
    </div>

</template>

<script>
    export default {
        name: 'welcome-model',

        data: function () {
			return {
                welcomeModal: 0,
                themeAssets: window.config.themeAssetsPath,
			}
        },

        methods: {
            close () {
                this.welcomeModal = 0;
            }
        }
    }
</script>

<style lang="scss">
    .footer {
        padding: 10px 0;
        text-align: center;

        .sepator {
            display: inline-block;
            border-bottom: 1px solid #F5F5F5;;
            width: 100px;
            margin-bottom: 10px;
        }

        p {
            font-size: 10px;
            margin-bottom: 10px;
            color: #757575;
        }

        a {
            font-size: 10px;
            color: #000000;
            text-transform: uppercase;
            cursor:pointer;
        }
    }
</style>
