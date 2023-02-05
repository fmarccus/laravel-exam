<script setup lang="ts">
import UserIndex from './users/UserIndex.vue';
</script>

<template>
  <main>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Red Core</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
          data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <RouterLink to="/users" class="nav-link">Users</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink to="/roles" class="nav-link">Roles</RouterLink>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <div class="container">
      <section class="mt-5">
        <h1>Jann Marcus Flores</h1>
        <div id="user_container">

        </div>
      </section>
    </div>
  </main>
</template>
