<script setup lang="ts">
import useRoles from "../../composables/roles.js";
import { onMounted } from 'vue';
const { roles, getRoles } = useRoles();

onMounted(() => getRoles());
</script>

<template>
    <main>
        <div class="container mt-5">
            <h3>Role Table</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Role Name</th>
                            <th>Description</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="role in roles" key="role.id" class="">
                            <td>{{ role.role_name }}</td>
                            <td>{{ role.description }}</td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</template>
