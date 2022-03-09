<style>

            .tab-content {
            max-height: 0;
            transition: all 0.8s;
            }
            input:checked + .tab-label .test {
                background-color: rgb(40, 74, 226);
            }
            input:checked + .tab-label .test svg {
                transform: rotate(180deg);
                stroke: white;
            }
            input:checked + .tab-label::after {
            transform: rotate(90deg);
            }
            input:checked ~ .tab-content {
            max-height: 100vh;
            }

            img {
                width: 20%;
                border-radius: 5%;
            }
            @media screen and (min-width: 633px) {
                .desktop{
                    display: flex;
                    padding: 10px;
                }
                .desktop p{
                    padding: 1em;
                }
                .nav{
                    width: 100%;
                    text-align: center;
                }
                .nav:hover{
                    background-color: rgb(206, 206, 206);
                    transition: ease-in-out 0.5s;
                }
                .stars{
                    background-color: blue;
                    width: 100%;
                }
            }
            @media screen and (max-width: 633px) {
                .tab{
                    overflow: hidden;
                }
                .tab img{
                    margin: auto;
                    margin-top: 10px;
                    margin-bottom: 25px;
                }
                .bot span{
                    text-align: center;
                }
                .desktop{
                    display: none;
                }
                .stars{
                    display: none;
                }
                .nav{
                    display: none;
                }
            }
</style>

<template>
<main class="w-3/5 p-8 mx-auto">
            <section class="shadow row">
                    <div class="desktop">
                        <img :src='star.image' class="image" >
                        <p>{{star.description}}</p>
                    </div>
                <div class="tabs inline" v-for="item in stars" :key="item.id">
                    <!-- Mobile -->
                    <div class="border-b tab sm:hidden">
                        <div class="border-l-2 border-transparent relative">
                            <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-6" type="checkbox" id="chck1">
                            <header class="flex justify-between items-center p-5 pl-8 pr-8 cursor-pointer select-none tab-label" for="chck1">
                                <span class="text-grey-darkest font-thin text-xl">
                                    {{item.lastname}} {{item.firstname}}
                                </span>
                                <div class="rounded-full w-7 h-7 flex items-center justify-center test">
                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <polyline points="6 9 12 15 18 9">
                                        </polyline>
                                    </svg>
                                </div>
                            </header>
                            <div class="tab-content">
                                <div class="pl-8 pr-8 pb-5 text-grey-darkest bot">
                                        <img :src='item.image' class="image" >
                                        <span class="pb-2">
                                            {{item.description}}
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-b nav">
                        <button @click="selectItem(item.id)" >{{item.firstname}} {{item.lastname}}</button>
                    </div>
                </div>
            </section>
        </main>
</template>

<script>
import useStars from '../../composables/stars';
import { onMounted } from 'vue'
export default {

    setup() {
        const { stars, getStars, getStar, star} = useStars()

        onMounted(getStars)
        const getImage = (name) =>{
            return './public/' + name
        }

        const selectItem = (id) => {
            getStar(id)
        }
        return{
            star,
            stars,
            getImage,
            selectItem
        }
    }
}

</script>
