<template>
  <div class="choose-lang">
    <div @click="handleDropdownList" class="selected-lang">
      <img class="flag" :src="require(`../../assets/flags/${getSelectedLang}.png`)" alt="lang-flag">
      <div class="txt">
        {{ getSelectedLang }}
      </div>
    </div>
    <ul v-if="isShowDropdownList" class="dropdown-list">
      <li @click="changeLanguage('tr')" class="item">
        <img class="flag" src="../../assets/flags/tr.png" alt="tr-flag">
        <div class="txt">
          Turkish
        </div>
      </li>
      <li @click="changeLanguage('en')" class="item">
        <img class="flag" src="../../assets/flags/en.png" alt="en-flag">
        <div class="txt">
          English
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  name: 'ChooseLanguage',
  data() {
    return {
      isShowDropdownList: false
    };
  },
  methods: {
    ...mapActions('auth', ['updateUserLanguage']),
    handleDropdownList() {
      this.isShowDropdownList = !this.isShowDropdownList;
    },
    changeLanguage(lang) {
      this.$helpers.setLanguage(lang);
      this.$i18n.locale = lang;
      this.handleDropdownList();
      this.updateUserLanguage(lang);
    }
  },
  computed: {
    getSelectedLang() {
      return this.$i18n.locale;
    }
  },
  created() {
    this.$helpers.clickOutside(this, 'isShowDropdownList');
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
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    background-color: $df-very-light-blue-color;

    &:hover {
      background-color: #e7ebf3;
    }

    .txt {
      margin-left: 7px;
      font-weight: 500;
      color: $df-black-and-blue-color !important;
    }
  }

  .dropdown-list {
    @include center-md-box-shadow;
    position: absolute;
    list-style-type: none;
    margin: 0;
    padding: 0;
    right: 0;
    width: 130px;
    border-radius: 4px;
    background-color: white;
    border-color: $df-very-light-blue-color;
    overflow: auto;
    font-size: 14px;
    z-index: 9;

    .item {
      display: flex;
      align-items: center;
      cursor: pointer;
      padding: 5px 10px;

      &:hover {
        background-color: $df-very-light-blue-color;
      }

      .txt {
        margin-left: 10px;
        color: $df-dark-blue-color;
      }
    }
  }
}
</style>
