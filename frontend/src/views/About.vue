<template>
  <div class="about-container">
    <top-header/>
    <div class="content">
      <div class="text">
        {{ $t('about.text') }}
      </div>
      <a target="_blank" href="https://github.com/halilcn/voteam" class="github-link">
        <div class="text">
          github
        </div>
        <img src="../assets/icons/github.png" alt="github-icon"/>
      </a>
    </div>
  </div>
</template>

<script>
import TopHeader from '../components/home/TopHeader';

export default {
  name: 'About',
  components: {
    TopHeader
  }
};
</script>

<style lang="scss" scoped>
.about-container {
  height: 100%;

  .content {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 40px;

    .text {
      font-size: 17px;
      color: $df-black-and-blue-color;
    }

    .github-link {
      margin-top: 20px;
      display: flex;
      align-items: center;
      color: $df-dark-blue-color;
      background-color: #e7e7e7;
      padding: 10px 30px;
      border-radius: 15px;

      &:hover {
        background-color: #dadada;
      }

      .text {
        font-size: 15px;
        font-weight: 500;
      }

      img {
        width: 30px;
        height: 30px;
        margin-left: 10px;
      }
    }
  }
}
</style>
