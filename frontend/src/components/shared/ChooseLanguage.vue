<template>
  <div class="choose-lang">
    <div @click="handleDropdownList" class="selected-lang">
      <img class="flag" src="@/assets/flags/tr.png" alt="tr-flag">
      <div class="txt">
        TR
      </div>
    </div>
    <ul v-if="isShowDropdownList" class="dropdown-list">
      <li class="item">
        <img class="flag" src="@/assets/flags/tr.png" alt="tr-flag">
        <div class="txt">
          Turkish
        </div>
      </li>
      <li class="item">
        <img class="flag" src="@/assets/flags/us.png" alt="tr-flag">
        <div class="txt">
          English
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'ChooseLanguage',
  data() {
    return {
      isShowDropdownList: true
    }
  },
  methods: {
    handleDropdownList() {
      this.isShowDropdownList = !this.isShowDropdownList
    }
  }
}
</script>

<style lang="scss" scoped>
.choose-lang {
  position: relative;

  .flag {
    width: 25px;
  }

  .selected-lang {
    display: flex;
    align-items: center;
    padding: 3px 7px;
    border-radius: 4px;
    cursor: pointer;

    .txt {
      margin-left: 3px;
      color: #2c3e50;
      font-weight: 500;
    }
  }

  .dropdown-list {
    position: absolute;
    list-style-type: none;
    margin: 0;
    padding: 0;
    right: 0;
    width: 130px;
    border-radius: 4px;
    background-color: white;
    border: 1px solid black;

    .item {
      display: flex;
      align-items: center;
      cursor: pointer;
      padding: 5px 10px;

      &:hover{
        background-color: #e2e5ea;
      }

      .txt {
        margin-left: 10px;
      }
    }
  }
}
</style>
