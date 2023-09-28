<template>
  <div class="container">
    <b-form @submit="onSubmit">
      <b-form-group
        class="mt-2"
        id="name-group"
        label="Имя:"
        label-for="name"
      >
        <b-form-input
          id="name"
          v-model="form.name"
          placeholder="Enter your name"
          required
          :state="notRequested ? null : !(errors.name && errors.name.length)"
        ></b-form-input>
        <b-form-invalid-feedback :state="notRequested ? null : !(errors.name && errors.name.length)" v-for="error in errors.name" :key="error">
          {{error}}
        </b-form-invalid-feedback>
      </b-form-group>

      <b-form-group class="mt-2" id="phone-group" label="Tелефонный номер:" label-for="phone">
        <b-form-input
          id="phone"
          v-model="form.phone"
          placeholder="Enter phone number"
          required
          :state="notRequested ? null : !(errors.phone && errors.phone.length)"
        ></b-form-input>
        <b-form-invalid-feedback :state="notRequested ? null : !(errors.phone && errors.phone.length)" v-for="error in errors.phone" :key="error">
          {{error}}
        </b-form-invalid-feedback>
      </b-form-group>
      <b-form-group class="mt-2" id="description-group" label="Текст заявки:" label-for="description">
        <b-form-textarea
          id="description"
          v-model="form.description"
          placeholder="Enter description"
          rows="3"
          max-rows="6"
          required
          :state="notRequested ? null : !(errors.description && errors.description.length)"
        ></b-form-textarea>
        <b-form-invalid-feedback :state="notRequested ? null : !(errors.description && errors.description.length)" v-for="error in errors.description" :key="error">
          {{error}}
        </b-form-invalid-feedback>
      </b-form-group>
      <b-alert class="mt-4 w-100" variant="success" :show="success">
        Таблица успешно создана в Google Sheet
      </b-alert>
      <b-overlay
        :show="loading"
        rounded
        opacity="0.6"
        spinner-small
        spinner-variant="primary"
        class="d-inline-block"
      >
        <b-button class="mt-2" type="submit" variant="primary">Отправить заявку</b-button>
      </b-overlay>

    </b-form>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
  data() {
    return {
      form: {
        name: '',
        phone: '',
        description: ''
      },
      loading: false,
      errors: {
        name: [],
        phone: [],
        description: []
      },
      notRequested: true,
      success: false,
    }
  },
  methods: {
    async onSubmit(event) {
      this.loading = true
      event.preventDefault()
      try {
        const sheet = await Axios.post('/api/sheets', this.form)
        this.success = true
      } catch (error) {
        if (error.response?.data?.errors) {
          this.errors = error.response.data.errors
        }
        this.success = false
        this.notRequested = false
      } finally {
        this.loading = false
      }

    },
  }
}
</script>

<style>

</style>