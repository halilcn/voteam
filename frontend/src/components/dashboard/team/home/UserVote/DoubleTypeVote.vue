<template>
  <div class="vote-text">
    Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının
    bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500'lerden beri endüstri
    standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek
    değişmeden
  </div>
  <div class="vote-actions">
    <div class="btn accept-button">
      <i class="bi bi-check-circle"></i>
      Kabul Et
    </div>
    <div class="btn refuse-button">
      <i class="bi bi-x-circle"></i>
      Reddet
    </div>
  </div>
</template>

<script>
export default {
  name: 'DoubleTypeVote'
};
</script>

<style lang="scss" scoped>
.vote-text {
  @include text-length-limit;
  text-align: justify;
}

.vote-actions {
  margin-top: 15px;
  font-weight: 400;
  display: flex;
  align-items: center;
  justify-content: space-evenly;

  .btn {
    width: 100%;
    padding: 7px;
    border-radius: 5px;
    cursor: pointer;
    margin: 0 20px;
    text-align: center;
    transition: .2s;
    border: 1px solid transparent;;

    &.accept-button {
      color: $df-green-color;
      background-color: $df-very-light-green-color;
      border-color: #dbfff1;

      &:hover {
        background-color: #dbfff1;
      }
    }

    &.refuse-button {
      color: $df-red-color;
      background-color: $df-very-light-red-color;
      border-color: #ffe5e5;

      &:hover {
        background-color: #ffe5e5;
      }
    }
  }
}
</style>
