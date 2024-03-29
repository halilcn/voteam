<template>
  <div class="home-content team">
    <div class="title">
      <i class="fas fa-users"></i>
      {{ $t('dashboard.home.teamInfo.team') }}
    </div>
    <div class="content team-info">
      <loading-animation v-if="isLoadingInfo"
                         :textLineCount="5"
                         :textCount="2"/>
      <template v-else>
        <div class="first-info">
          <img class="team-image" :src="info.image" alt="team-image"/>
          <div class="texts">
            <div class="text team-name">
              {{ info.name }}
            </div>
            <div @click="copyCode(info.join_code)"
                 :class="{'copied-code':isCopiedCode}"
                 class="text team-code">
              {{ info.join_code }}
              <info-tooltip
                  class="copied-code-info"
                  :text="$t('dashboard.home.teamInfo.codeCopied')"
                  icon-class="bi bi-check-circle"/>
            </div>
          </div>
        </div>
        <div class="info">
          <div class="info-title">
            <div class="text">
              {{ $t('dashboard.home.teamInfo.membersCount') }}
            </div>
          </div>
          <div class="info-content">
            {{ info.total_users_count }}
          </div>
        </div>
        <div class="info">
          <div class="info-title">
            <div class="text">
              {{ $t('dashboard.home.teamInfo.totalStartedVotes') }}
            </div>
          </div>
          <div class="info-content">
            {{ info.total_started_votes }}
          </div>
        </div>
        <div class="info">
          <div class="info-title">
            <div class="text">
              {{ $t('dashboard.home.teamInfo.membersTurnoutToVote') }}
            </div>
          </div>
          <div class="info-content">
            <template v-if="info.vote_join_percentage">
              %{{ info.vote_join_percentage.toFixed(2) }}
            </template>
            <div v-else class="voted-percentage-error">
              {{ $t('dashboard.home.teamInfo.notCalculated') }}
            </div>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import InfoTooltip from '../../../shared/InfoTooltip';
import LoadingAnimation from '../../../shared/LoadingAnimation';
import { mapActions } from 'vuex';

export default {
  name: 'TeamInfo',
  data() {
    return {
      info: {},
      isCopiedCode: false,
      isLoadingInfo: true
    };
  },
  components: {
    InfoTooltip,
    LoadingAnimation
  },
  methods: {
    ...mapActions('activeTeam', ['getTeamInfo']),
    copyCode(text) {
      this.$helpers.copyText(text.substring(1));
      this.isCopiedCode = true;
      setTimeout(() => {
        this.isCopiedCode = false;
      }, 3000);
    },
    getTeamInfoAction() {
      this.handle(async () => {
        this.isLoadingInfo = true;
        this.info = await this.getTeamInfo();
      })
          .finally(() => {
            this.isLoadingInfo = false;
          });
    }
  },
  created() {
    this.getTeamInfoAction();
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
