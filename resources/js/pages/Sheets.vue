<template>
  <div class="container">
    <b-table :busy.sync="loading" hover responsive :items="sheets" :fields="fields">
      <template #cell(url)="data">
        <a :href="data.item.url" target="_blank" v-b-tooltip.hover.right="{ variant: 'info' }" :title="data.item.url">Url</a>
      </template>
    </b-table>
  </div>
</template>

<script>
import Axios from 'axios'
export default {
  data() {
    return {
      fields: [
        {key: 'id', label: 'ИД'},
        {key: 'name', label: 'Имя'},
        {key: 'phone', label: 'Телефонный номер'},
        {key: 'description', label: 'Текст заявки'},
        {key: 'url', label: 'Ссылка'},
        {key: 'created_at', label: 'Создан в'},
      ],
      sheets: [],
      loading: true
    }
  },
  async mounted() {
    await this.getSheets()
  },
  methods: {
    async getSheets() {
      try {
        const {data: {data}} = await Axios.get('/api/sheets') 
        this.sheets = data
      } catch (error) {
        throw new Error(error)
      } finally {
        this.loading = false
      }
    },
  }
}
</script>

<style>

</style>