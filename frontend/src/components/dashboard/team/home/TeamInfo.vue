<template>
  <div class="home-content team">
    <div class="title">
      <i class="bi bi-people"></i>
      Takım
    </div>
    <div class="content team-info">
      <div class="item team-image">
        <img src="../../../../assets/test/team.png" alt="team-image"/>
      </div>
      <div class="item">
        <div class="content-title">
          Adı
        </div>
        <div class="inner-content">
          Takım adı denemedı deneme
        </div>
      </div>
      <div class="item team-code">
        <div class="content-title">
          Kodu
        </div>
        <div
            @click="copyCode('#43F4S')"
            :class="{'copied-code':isCopiedCode}"
            class="inner-content">
          #43F4S
          <info-tooltip
              class="copied-code-info"
              text="Kod kopyalandı !"
              icon-class="bi bi-check-circle"/>
        </div>
      </div>
      <div class="item">
        <div class="content-title">
          Toplam Üye Sayısı
        </div>
        <div class="inner-content">
          23 kişi
        </div>
      </div>
      <div class="item">
        <div class="content-title">
          Toplam Başlatılan Oylama Sayısı
        </div>
        <div class="inner-content">
          23 oylama
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import InfoTooltip from '../../../shared/InfoTooltip';
import { mapActions } from 'vuex';

export default {
  name: 'TeamInfo',
  data() {
    return {
      isCopiedCode: false
    };
  },
  components: {
    InfoTooltip
  },
  methods: {
    ...mapActions('team', ['getTeamInfo']),
    copyCode(text) {
      this.$helpers.copyText(text);
      this.isCopiedCode = true;
      setTimeout(() => {
        this.isCopiedCode = false;
      }, 3000);
    }
  },
  created() {
    this.getTeamInfo();
  }
};
</script>

<style lang="scss" scoped>
@include dashboard-team-home-contents;

.team {
  .team-info {
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    //height büyüdükçe margin ver.

    .item {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      margin-bottom: 30px;

      &.team-code {
        .inner-content {
          display: flex;
          align-items: center;
          background-color: $df-very-light-blue-color;
          color: $df-blue-color;
          padding: 4px 7px;
          border-radius: 4px;
          cursor: pointer;

          .copied-code-info {
            margin-left: 4px;
            display: none;
          }

          &.copied-code {
            background-color: #f5f5f5;
            color: $df-light-dark-black-color;

            .copied-code-info {
              display: block;
            }

          }

        }

      }

      &.team-image {
        position: absolute;
        right: 20px;
        top: 20px;

        img {
          @include center-md-box-shadow;
          width: 120px;
          height: 120px;
          border-radius: 100%;
        }
      }

      .inner-content {
        margin-top: 4px;
        font-size: 15px;
      }
    }
  }
}
</style>
