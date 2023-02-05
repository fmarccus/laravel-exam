import { ref } from "vue";
import axios from "axios";


export default function useRoles() {
    const roles = ref([]);

    const getRoles = async () => {
        const response = await axios.get("http://127.0.0.1:8000/sanctum/csrf-cookie/roles");
        roles.value = response.data.data;
    }
    return {
        roles,
        getRoles
    }
}