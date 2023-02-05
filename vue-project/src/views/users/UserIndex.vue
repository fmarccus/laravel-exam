<script setup lang="ts">
import useUsers from "../../composables/users.js";
import { onMounted } from 'vue';
const { users, getUsers } = useUsers();
onMounted(() => getUsers());
</script>

<template>
    <main>
        <div class="container mt-5">
            <h3>User Table</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" key="user.id" class="">
                            <td>{{ user.full_name }}</td>
                            <td>{{ user.email_address }}</td>
                            <td>{{ user.role_name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</template>
