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
.vote-actions {
  display: flex;
  align-items: center;
  justify-content: space-evenly;

  .btn {
    padding: 7px 30px;
    border-radius: 5px;
    cursor: pointer;

    &.accept-button {
      color: $df-green-color;
      background-color: $df-very-light-green-color;

      &:hover {
        background-color: #dbfff1;;
      }
    }

    &.refuse-button {
      color: $df-red-color;
      background-color: $df-very-light-red-color;

      &:hover {
        background-color: #f6d8d8;
      }
    }
  }

}
</style>
