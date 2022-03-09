import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default function useStars() {
    const stars = ref([]);
    const star = ref([]);
    const router = useRouter();
    const errors = ref('');
    const file = ref('')
    const getStars = async () => {
       let response = await axios.get('/api/stars');
       stars.value = response.data.data;
    }

    const getStar = async (id) => {
       let response = await axios.get('/api/stars/' + id);
       star.value = response.data.data;
    }

    const destroyStars = async (id) => {
       await axios.delete('/api/stars/' + id);
    }
    const storeStars = async (data) => {
        errors.value = ''
        try{
            const formData = new FormData()
            formData.append('image', data.image, data.image.name)
            formData.append('firstname', data.firstname)
            formData.append('lastname', data.lastname)
            formData.append('description', data.description)
            console.log(formData)
            await axios.post('/api/stars/', formData, {
                headers: {
                    "Content-Type": "multipart/form-data",
                }
            });
            await router.push({name: 'stars.index'});
        } catch (e) {
            if(e.response.status === 422){
                errors.value = e.response.data.errors
            }
        }
    }
    const updateStar = async (id) => {
        errors.value = ''
        try{
            await axios.put('/api/stars/'+ id, star.value);
            await router.push({name: 'stars.index'});
        } catch (e) {
            if(e.response.status === 422){
                errors.value = e.response.data.errors
            }
        }
    }

    return {
        stars,
        star,
        file,
        errors,
        getStars,
        getStar,
        storeStars,
        updateStar,
        destroyStars
    }
}
