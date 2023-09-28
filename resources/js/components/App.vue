<template>
  <div>
    <header>
      <b-navbar type="dark" variant="dark">
        <b-navbar-nav>
          <b-nav-item to="/">Создать</b-nav-item>
          <b-nav-item to="/sheets">Таблицы</b-nav-item>
        </b-navbar-nav>
      </b-navbar>
    </header>
    <div class="pt-4">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>