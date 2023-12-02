<script setup>
import { ref } from 'vue';

const errors = ref();
const form = ref({});

const onCreate = async () => {
  try {
    const response = await axios.post('/api/create_employee', form.value)
    if (response.status === 200) {
      alert('Created successfully');
      form.value = {};
    }
  } catch (e) {
    if (e && e.response.data && e.response.data.errors) {
      alert(e.response.data.errors)
    }
  }
}

</script>
      

<template>
  <div class="container" style="margin:15px">
    <h1>Create an Employee</h1>
    <div class="card__content">
      <div style="display: flex; padding: 30px;">
        <div>
          <div style="margin:15px">
            <label for="name">
              Name
            </label>
            <input class="input" id="name" type="text" v-model="form.name" required />
          </div>
          <div style="margin:15px">
            <label for="email">
              Email
            </label>
            <input class="input" id="email" type="text" v-model="form.email" required />
          </div>
          <div style="margin:15px">
            <label for="role">
              Role
            </label>
            <select class="input" name="role" id="role" v-model="form.role">
              <option disabled>Assign to</option>
              <option :value="1">Frontoffice Employee</option>
              <option :value="2">Backoffice Employee</option>
            </select>
          </div>
          <div style="margin:15px">
            <label for="username">
              Username
            </label>
            <input class="input" id="username" type="text" v-model="form.username" required />
          </div>
          <div style="margin:15px">
            <label for="password">
              Password
            </label>
            <input class="input" id="password" type="text" v-model="form.password" required />
          </div>
          <div style="margin:15px">
            <a class="btn btn-secondary" @click="onCreate()">
              Create
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>