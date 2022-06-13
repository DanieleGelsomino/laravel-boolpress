<template>
  <div class="container">
    <div class="row text-center">
      <div class="col-12 mt-5">
        <h3>Contattaci</h3>
      </div>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="col-5">
        <form method="post">
          <div class="mb-3">
            <label for="emailInput" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailInput" />
            <div class="form-text">
              Non condivideremo la tua mail con nessuno.
            </div>
          </div>
          <div class="form-floating">
            <label for="floatingTextarea">Messaggio</label>
            <textarea
              class="form-control"
              placeholder="Scrivi un messaggio"
              id="floatingTextarea"
            ></textarea>
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary mb-3">Invia</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContactsComponent",
};
</script>

<style>
</style>
