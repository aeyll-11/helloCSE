<template>
   <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" >
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveStar">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                <div class="mt-1">
                    <input type="text" name="firstname" id="firstname"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.firstname">
                </div>
            </div>

            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                <div class="mt-1">
                    <input type="text" name="lastname" id="lastname"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.lastname">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <input type="text" name="description" id="description"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="form.description">
                </div>
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <input ref="file" type="file" name="file" id="file"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           @change="selectImage">
                </div>
            </div>

        </div>

        <button type="submit"
                class="inline-flex mt-2 items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Create
        </button>
    </form>
</template>

<script>
import { reactive } from '@vue/reactivity';
import useStars from '../../composables/stars';
import { ref } from 'vue';

export default {
    setup() {
        const form = reactive({
            'firstname':'',
            'lastname':'',
            'description':'',
            'image': ''
        });

        const { errors ,storeStars, file} = useStars();

        const selectImage = () => {
            console.log(file)
        }

        const saveStar = async () => {
            await storeStars({...form});
        }
        return {
            form,
            errors,
            saveStar,
            selectImage
        }
    }
}
</script>
