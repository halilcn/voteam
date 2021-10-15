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
        <input class="content-text item"/>
        <div class="delete">
          <i class="bi bi-trash"></i>
        </div>
      </div>
      <div class="item-container image-item">
        <!-- <input type="file" class="content-text item"/>-->
        <div class="content-text selected-image">
          Fotoğraf Seçildi. <span class="show-image">Görüntüle</span>
        </div>
        <div class="delete">
          <i class="bi bi-trash-fill"></i>
        </div>
      </div>
    </div>
    <div class="add-options-list-item-btn">
      <i class="bi bi-plus"></i>
      ekle
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
  components: {
    VoteTitle,
    VoteStartDate,
    VoteEndDate
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;

.options-list {
  .item-container {
    display: flex;
    margin: 5px 0;

    &.text-item {

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
      padding: 4px 11px;
      border-radius: 4px;
      cursor: pointer;
      display: flex;
      align-items: center;

      &:hover {
        background-color: #ffe6e6;
      }
    }
  }
}

.add-options-list-item-btn {
  margin-top: 5px;
  font-weight: 300;
  font-size: 12px;
  cursor: pointer;
  color: $df-blue-color;
  background-color: #eaf2ff;
  display: inline-block;
  padding: 2px 7px;
  border-radius: 4px;
}
</style>
