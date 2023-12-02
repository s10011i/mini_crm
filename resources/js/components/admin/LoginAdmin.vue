<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';


const router = useRouter();
const form = ref({});

const onLogin = async () => {
  try {
    const response = await axios.post('/api/login_admin', form.value)
    if (response.status === 200) {
      sessionStorage.setItem("id", response.data.data.username)
      router.push('/create_employee')
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
    <h1>Admin Login Section</h1>
    <div class="card__content">
      <div style="display: flex; padding: 30px;">
        <div>
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
            <a class="btn btn-secondary" @click="onLogin">
              Log in
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>