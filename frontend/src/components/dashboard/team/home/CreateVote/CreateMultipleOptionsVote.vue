<template>
  <div class="vote-type-title">
    Klasik Oylama
  </div>
  <vote-title/>
  <div class="form-item">
    <div class="title">
      Oy Seçenekleri
    </div>
    <div class="content options-list">
      <!--textarea ??-->
      <div class="item-container text-item">
        <textarea class="content-text item"/>
        <div class="delete">
          <i class="bi bi-trash"></i>
        </div>
      </div>
      <!-- <div class="item-container text-item">
        <input class="content-text item"/>
        <div class="delete">
          <i class="bi bi-trash"></i>
        </div>
      </div>-->
      <div class="item-container image-item">
        <!-- <input type="file" class="content-text item"/>-->
        <div class="content-text selected-image">
          Fotoğraf Seçildi. <span class="show-image">Görüntüle</span>
        </div>
        <div class="delete">
          <i class="bi bi-trash-fill"></i>
        </div>
      </div>
      <div class="item-container image-item">
        <input type="file" class="content-text item"/>
        <div class="delete">
          <i class="bi bi-trash-fill"></i>
        </div>
      </div>
    </div>
    <div class="add-options-list-item-btn">
      <div @click="toggleOptionsList" class="btn">
        <i class="bi bi-plus"></i>
        ekle
      </div>
      <div v-if="isEnableOptionsList" class="options-type-list">
        <div class="item">
          <i class="bi bi-card-text"></i>
        </div>
        <div class="item">
          <i class="bi bi-image"></i>
        </div>
      </div>
    </div>
  </div>
  <vote-start-date/>
  <vote-end-date/>
</template>

<script>
import VoteTitle from './CreateVoteItems/VoteTitle';
import VoteStartDate from './CreateVoteItems/VoteStartDate';
import VoteEndDate from './CreateVoteItems/VoteEndDate';

export default {
  name: 'CreateClassicVote',
  data() {
    return {
      isEnableOptionsList: false
    };
  },
  components: {
    VoteTitle,
    VoteStartDate,
    VoteEndDate
  },
  methods: {
    toggleOptionsList() {
      this.isEnableOptionsList = !this.isEnableOptionsList;
    }
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;

.options-list {
  .item-container {
    display: flex;
    align-items: center;
    margin: 5px 0;

    &.text-item {
      .item {
        resize: vertical;
        height: 40px;
        max-height: 80px;
      }
    }

    &.image-item {
      .selected-image {
        color: $df-green-color;

        .show-image {
          margin-left: 10px;
          cursor: pointer;
          color: black;

          &:hover {
            text-decoration: underline;
            color: $df-dark-blue-color;
          }
        }
      }


    }

    .delete {
      margin-left: 10px;
      color: $df-red-color;
      background-color: #fff5f5;
      padding: 7px 11px;
      border-radius: 4px;
      cursor: pointer;

      &:hover {
        background-color: #ffe6e6;
      }
    }
  }
}

.add-options-list-item-btn {
  margin-top: 5px;
  display: inline-block;
  position: relative;

  .btn {
    font-weight: 300;
    font-size: 12px;
    cursor: pointer;
    color: $df-blue-color;
    background-color: #eaf2ff;
    padding: 2px 7px;
    border-radius: 4px;
  }

  .options-type-list {
    @include center-md-box-shadow;
    position: absolute;
    left: 60px;
    top: -20px;
    width: 100%;
    background-color: white;
    border-radius: 5px;
    overflow: hidden;

    .item {
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 20px;
      cursor: pointer;
      color: $df-dark-blue-color;

      &:hover {
        background-color: #efefef;
      }

      i {
      }
    }
  }

}
</style>
