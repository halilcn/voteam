<template>
  {{voteData}}
  <div class="user-list">
    <div class="item">
      <div class="user-info">
        <img class="image" src="http://127.0.0.1:8080/img/me.07564627.jpg" alt="user-image">
        <div title="Halil" class="name">
          Halil Can asdadjasıdasdh ajsdhasjda jhdas
        </div>
      </div>
      <div class="power-percentage">
        <div class="power-percentage-info">
          <input v-model="test" type="number">
          birim güç
        </div>
        <div class="power-range">
          <input v-model="test" type="range" min="0" max="50" step="1">
        </div>
      </div>
    </div>
    <div class="item">
      <div class="user-info">
        <img class="image" src="http://127.0.0.1:8080/img/me.07564627.jpg" alt="user-image">
        <div title="Halil" class="name">
          Halil Can asdadjasıdasdh ajsdhasjda jhdas
        </div>
      </div>
      <div class="power-percentage">
        <div class="power-percentage-info">
          <input v-model="test" type="number">
          birim güç
        </div>
        <div class="power-range">
          <input v-model="test" type="range" min="0" max="50" step="1">
        </div>
      </div>
    </div>
    <div class="item">
      <div class="user-info">
        <img class="image" src="http://127.0.0.1:8080/img/me.07564627.jpg" alt="user-image">
        <div title="Halil" class="name">
          Halil Can asdadjasıdasdh ajsdhasjda jhdas
        </div>
      </div>
      <div class="power-percentage">
        <div class="power-percentage-info">
          <input v-model="test" type="number">
          birim güç
        </div>
        <div class="power-range">
          <input v-model="test" type="range" min="0" max="50" step="1">
        </div>
      </div>
    </div>
    <div class="item">
      <div class="user-info">
        <img class="image" src="http://127.0.0.1:8080/img/me.07564627.jpg" alt="user-image">
        <div title="Halil" class="name">
          Halil Can asdadjasıdasdh ajsdhasjda jhdas
        </div>
      </div>
      <div class="power-percentage">
        <div class="power-percentage-info">
          <input v-model="test" type="number">
          birim güç
        </div>
        <div class="power-range">
          <input v-model="test" type="range" min="0" max="50" step="1">
        </div>
      </div>
    </div>
    <div class="item">
      <div class="user-info">
        <img class="image" src="http://127.0.0.1:8080/img/me.07564627.jpg" alt="user-image">
        <div title="Halil" class="name">
          Halil Can asdadjasıdasdh ajsdhasjda jhdas
        </div>
      </div>
      <div class="power-percentage">
        <div class="power-percentage-info">
          <input v-model="test" type="number">
          birim güç
        </div>
        <div class="power-range">
          <input v-model="test" type="range" min="0" max="50" step="1">
        </div>
      </div>
    </div>
    <div class="item">
      <div class="user-info">
        <img class="image" src="http://127.0.0.1:8080/img/me.07564627.jpg" alt="user-image">
        <div title="Halil" class="name">
          Halil Can asdadjasıdasdh ajsdhasjda jhdas
        </div>
      </div>
      <div class="power-percentage">
        <div class="power-percentage-info">
          <input v-model="test" type="number">
          birim güç
        </div>
        <div class="power-range">
          <input v-model="test" type="range" min="0" max="50" step="1">
        </div>
      </div>
    </div>
  </div>
  <div class="power-vote-bottom">
    <div class="total-power-info">
      Toplam Kalan 1000 Güç
    </div>
    <standart-button text="Güç Ver"/>
  </div>
</template>

<script>
import StandartButton from '../../../../shared/elements/StandartButton';

export default {
  name: 'PowerTypeVote',
  emits: ['postAnswerVote'],
  props: ['voteData', 'isLoading'],
  data() {
    return {
      test: 0
    };
  },
  components: {
    StandartButton
  }
};
</script>

<style lang="scss" scoped>

//TODO: User list scroll !
//TODO: User name width kısıtlama. Üstüne gelince full isim gözükmesi

.user-list {
  height: 180px; // !
  overflow-y: auto;
  padding: 0 8px;

  &::-webkit-scrollbar {
    width: 6px;
  }

  .item {
    @include center-lg-box-shadow;
    display: flex;
    margin: 10px 0;
    border-radius: 5px;
    padding: 5px;

    .user-info {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      width: 100%;

      .image {
        width: 40px;
        height: 40px;
        border-radius: 100%;
      }

      .name {
        @include text-width-limit;
        margin-left: 20px;
        font-size: 16px;
        font-weight: 400;
        color: $df-dark-blue-color;
        width: 140px; // bul olmamalı ? width 100% ?
      }
    }

    .power-percentage {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 300px;

      .power-percentage-info {
        input {
          @include std-input;
          padding: 3px !important;
          border-width: 0px;
          text-align: center;
          width: 40px; // ?
          background-color: #f6f6f6;
        }

      }

      .power-range {
        margin-top: 5px;
        width: 100%;

        input {
          width: 100%;
          background-color: red;
        }

      }
    }
  }
}

.power-vote-bottom {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-top: 20px;
  border-top: 1px solid #c7d9ff;
  padding-top: 10px;

  .total-power-info {
    padding: 5px 10px;
    background-color: $df-very-light-blue-color;
    color: $df-blue-color;
    border-radius: 5px;
  }
}
</style>
