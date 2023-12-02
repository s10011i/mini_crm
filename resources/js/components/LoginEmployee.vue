<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';


const router = useRouter();
const form = ref({});

const onLogin = async () => {
  try {
    const response = await axios.post('/api/login_employee', form.value)
    if (response.status === 200) {
      sessionStorage.setItem("id", response.data.employee.username)
      sessionStorage.setItem("role", response.data.employee.role)
      if (response?.data?.employee?.role == '2') {
        router.push('/my_entries/' + response?.data?.employee?.id);
        return;
      }
      router.push('/display_all_entries')
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
    <h1>Employee Login Section</h1>
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
            <input class="input" id="password" type="password" v-model="form.password" required />
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