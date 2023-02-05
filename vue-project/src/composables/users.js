import { ref } from "vue";
import axios from "axios";


export default function useUsers() {
    const users = ref([]);
    const user = ref([]);

    const getUsers = async () => {
        const response = await axios.get("http://127.0.0.1:8000/sanctum/csrf-cookie/users");
        users.value = response.data.data;
    }
    return {
        users,
        user,
        getUsers
    }
}