<template>
  <div class="home-content team">
    <div class="title">
      <i class="fas fa-users"></i>
      Takım
    </div>
    <div class="content team-info">
      <div class="first-info">
        <img class="team-image" src="../../../../assets/test/team.png" alt="team-image"/>
        <div class="texts">
          <div class="text team-name">
            Takım adı
          </div>
          <div @click="copyCode('#43F4S')"
               :class="{'copied-code':isCopiedCode}"
               class="text team-code">
            #43F4S
            <info-tooltip
                class="copied-code-info"
                text="Kod kopyalandı !"
                icon-class="bi bi-check-circle"/>
          </div>
        </div>
      </div>
      <div class="info">
        <div class="info-title">
          <div class="text">
            Üye Sayısı
          </div>
        </div>
        <div class="info-content">
          23
        </div>
      </div>
      <div class="info">
        <div class="info-title">
          <div class="text">
            Toplam Başlatılan Oylama
          </div>
        </div>
        <div class="info-content">
          23
        </div>
      </div>
      <div class="info">
        <div class="info-title">
          <div class="text">
            Oylara Katılım Oranı
          </div>
        </div>
        <div class="info-content">
          <div class="voted-percentage-error">
            Henüz hesaplanmamış
          </div>
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
    display: flex;
    flex-direction: column;
    justify-content: space-between;

    .first-info {
      display: flex;
      align-items: center;
      padding: 20px;
      border: 1px solid #e0e6e8;
      border-radius: 5px;

      .team-image {
        width: 120px;
        height: 120px;
        border-radius: 100%;
      }

      .texts {
        display: flex;
        flex-direction: column;
        margin-left: 30px;

        .text {
          font-size: 16px;
          margin: 4px 0;

          &.team-name {
            color: $df-dark-blue-color;
          }

          &.team-code {
            display: flex;
            align-items: center;
            background-color: $df-very-light-blue-color;
            color: $df-blue-color;
            padding: 4px 7px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;

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
      }
    }

    .info {
      @include center-lg-box-shadow ;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      border-radius: 5px;
      height: 70px;

      .info-title {
        .text {
          color: #5a6675;
        }
      }

      .info-content {
        font-size: 25px;
        color: #1b5b83;

        .voted-percentage-error {
          font-size: 12px;
          color: #a1b4be;
          font-weight: 300;
        }
      }
    }
  }
}

@media only screen and (min-height: 710px) {
  .team .team-info {
    justify-content: flex-start;

    > div {
      margin-bottom: 30px;
    }
  }
}
</style>
