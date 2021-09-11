<template>
  <div class="choose-lang">
    <div @click="handleDropdownList" class="selected-lang">
      <img class="flag" src="@/assets/flags/tr.png" alt="tr-flag">
      <div class="txt">
        TR
      </div>
    </div>
    <ul v-if="isShowDropdownList" class="dropdown-list">
      <li @click="changeLanguage('TR')" class="item">
        <img class="flag" src="@/assets/flags/tr.png" alt="tr-flag">
        <div class="txt">
          Turkish
        </div>
      </li>
      <li @click="changeLanguage('EN')" class="item">
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
      isShowDropdownList: false
    };
  },
  methods: {
    handleDropdownList() {
      this.isShowDropdownList = !this.isShowDropdownList;
    },
    changeLanguage(lang) {
      alert(lang);
    }
  },
  created() {
    let self = this;
    window.addEventListener('click', function (e) {
      // Todo:Helper class'a alma ?
      if (!self.$el.contains(e.target)) {
        console.log('out click çalıştırma her zamna çalışıyor!!!!');
        self.isShowDropdownList = false;
      }
    });
  }
};
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
    background-color: #f1f4fa;

    &:hover {
      background-color: #e7ebf3;
    }

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
    border-color: #d0d9ee;
    overflow: auto;
    font-size: 14px;

    box-shadow: 0 0px 0.4px rgba(0, 0, 0, 0.017),
    0 0px 0.9px rgba(0, 0, 0, 0.024),
    0 0px 1.8px rgba(0, 0, 0, 0.03),
    0 0px 3.1px rgba(0, 0, 0, 0.036),
    0 0px 5.8px rgba(0, 0, 0, 0.043),
    0 0px 14px rgba(0, 0, 0, 0.06);

    .item {
      display: flex;
      align-items: center;
      cursor: pointer;
      padding: 5px 10px;

      &:hover {
        background-color: #f1f4fa;
      }

      .txt {
        margin-left: 10px;
      }
    }
  }
}
</style>
