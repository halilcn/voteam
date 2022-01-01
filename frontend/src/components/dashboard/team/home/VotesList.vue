<template>
  <create-vote-popup
      @handlePopup="toggleCreateVotePopup"
      :is-enable="isEnableCreateVotePopup"
      v-model:should-get-votes="shouldGetVotes"/>
  <create-power-vote
      @handlePopup="toggleCreatePowerVotePopup"
      :is-enable="isEnableCreatePowerVotePopup"
      v-model:should-get-votes="shouldGetVotes"/>
  <user-vote-popup
      @handlePopup="toggleUserVotePopup"
      :is-enable="isEnableUserVotePopup"
      :vote-id="voteIdForUserVote"
      v-model:should-get-votes="shouldGetVotes"/>
  <finished-vote-popup
      @handlePopup="toggleFinishedVotePopup"
      :is-enable="isEnableFinishedVotePopup"/>

  <div class="home-content votes">
    <div class="title votes-title">
      <div class="txt">
        <i class="fas fa-poll"></i>
        Oylamalar
      </div>
      <loading-animation v-if="isLoading.votesActions"
                         class="loading-votes-actions"
                         :textLineCount="1"/>
      <div v-else class="vote-actions">
        <div v-if="!dataForPowerType.power_vote_voted"
             @click="toggleCreatePowerVotePopup"
             class="create-power-vote btn">
          Güç Oylaması
        </div>
        <div v-else
             @click="toggleFinishedVotePopup"
             class="finished-votes-btn btn">
          Bitmiş Oylamalar
        </div>
        <div
            @click="toggleCreateVotePopup"
            class="create-vote btn"
            :class="{disable:!dataForPowerType.power_vote_voted || !dataForPowerType.user_has_user_power}">
          <div class="power-vote-info">
            <i class="bi bi-exclamation-triangle-fill"></i>
            {{
              !dataForPowerType.power_vote_voted
                  ? 'Güç oylaması gerekir'
                  : userHasNotUserPower ? 'Güç oylamasına katılman gerekir' : ''
            }}
          </div>
          <i class="bi bi-plus-circle-fill"></i>
          Oylama Başlat
        </div>
      </div>
    </div>
    <div class="content list-container">
      <loading-animation v-if="isLoading.votes"
                         :textLineCount="5"
                         :textCount="2"/>
      <template v-else>
        <div class="votes-type-list active-votes">
          <div class="content-title">
            Aktif Oylamalar
          </div>
          <div class="list">
            <template v-if="votes.active.length > 0">
              <div v-for="(vote,index) in votes.active"
                   :key="index"
                   class="item-container">
                <div class="item"
                     @click="showUserVotePopup(vote.id)"
                     :class="activeVoteItemClass(vote)">
                  <div class="top">
                    <div class="voted-percentage">
                      %{{ vote.voted_percentage }}
                    </div>
                    <div class="icon">
                      <img :src="require(`../../../../assets/icons/${vote.type}-type-vote.png`)" alt="vote-type"/>
                    </div>
                    <div class="vote-name">
                      {{ vote.title }}
                    </div>
                  </div>
                  <div class="bottom-info time">
                    <i class="bi bi-stopwatch-fill"></i>
                    {{ $dayjs(vote.end_date).from($dayjs().utc()) }}
                  </div>
                  <div class="bottom-info voted-info">
                    <i class="bi bi-check-all"></i>
                    Oy Verilmiş !
                  </div>
                </div>
              </div>
            </template>
            <div v-else class="no-data">
              <img src="../../../../assets/icons/no-vote.png" alt="no-vote"/>
              <div class="text">
                Aktif oylama hiç yok
              </div>
            </div>
          </div>
        </div>
        <div class="votes-type-list next-votes">
          <div class="content-title">
            Gelecek Oylamalar
            <info-tooltip text="Güç Oylaması ve Lider Oylaması her ay yapılır."
                          class="next-vote-info"/>
          </div>
          <div class="list">
            <template v-if="votes.nextDate.length > 0">
              <div
                  v-for="(vote,index) in votes.nextDate"
                  :key="index"
                  class="item-container">
                <div class="item">
                  <div class="top">
                    <div class="icon">
                      <img :src="require(`../../../../assets/icons/${vote.type}-type-vote.png`)" alt="vote-type"/>
                    </div>
                    <div class="vote-name">
                      {{ vote.title }}
                    </div>
                  </div>
                  <div class="bottom-info time">
                    <i class="bi bi-clock-fill"></i>
                    {{ $dayjs(vote.start_date).from($dayjs().utc()) }}
                  </div>
                </div>
              </div>
            </template>
            <div v-else class="no-data">
              <img src="../../../../assets/icons/no-vote.png" alt="note-vote"/>
              <div class="text">
                Gelecek oylama hiç yok
              </div>
            </div>
          </div>
        </div>
      </template>
    </div>
  </div>
</template>

<script>
import CreateVotePopup from './create-vote/CreateVotePopup';
import CreatePowerVote from './create-vote/CreateFirstPowerVote';
import InfoTooltip from '../../../shared/InfoTooltip';
import LoadingAnimation from '../../../shared/LoadingAnimation';
import UserVotePopup from './user-vote/UserVotePopup';
import constants from '../../../../store/constants';
import { mapActions, mapState } from 'vuex';
import FinishedVotePopup from './finished-vote/FinishedVotePopup';

export default {
  name: 'VotesList',
  data() {
    return {
      isEnableCreateVotePopup: false,
      isEnableCreatePowerVotePopup: false,
      isEnableUserVotePopup: false,
      isEnableFinishedVotePopup: false,
      isLoading: {
        votes: true,
        votesActions: true
      },
      dataForPowerType: {},
      shouldGetVotes: false,
      voteIdForUserVote: null
    };
  },
  watch: {
    shouldGetVotes(newValue) {
      if (newValue) this.getVotesAction();
      this.shouldGetVotes = false;
    }
  },
  components: {
    FinishedVotePopup,
    CreateVotePopup,
    CreatePowerVote,
    InfoTooltip,
    LoadingAnimation,
    UserVotePopup
  },
  methods: {
    ...mapActions('vote', ['getVotes', 'checkHasPowerTypeVote']),
    getVotesAction() {
      this.handle(async () => {
        this.isLoading.votes = true;
        await this.getVotes();
      })
          .finally(() => {
            this.isLoading.votes = false;
          });
    },
    checkHasPowerTypeVoteAction() {
      this.handle(async () => {
        this.isLoading.votesActions = true;
        this.dataForPowerType = await this.checkHasPowerTypeVote();
      })
          .finally(() => {
            this.isLoading.votesActions = false;
          });
    },
    toggleCreateVotePopup() {
      this.isEnableCreateVotePopup = !this.isEnableCreateVotePopup;
    },
    toggleCreatePowerVotePopup() {
      this.isEnableCreatePowerVotePopup = !this.isEnableCreatePowerVotePopup;
    },
    toggleUserVotePopup() {
      this.isEnableUserVotePopup = !this.isEnableUserVotePopup;
    },
    toggleFinishedVotePopup() {
      this.isEnableFinishedVotePopup = !this.isEnableFinishedVotePopup;
    },
    showUserVotePopup(voteId) {
      this.voteIdForUserVote = voteId;
      this.toggleUserVotePopup();
    },
    activeVoteItemClass(vote) {
      return {
        voted: vote.is_voted,
        'everyone-voted': vote.voted_percentage === 100,
        'user-has-not-user-power': this.userHasNotUserPower && vote.type !== constants.VOTE_TYPES['POWER']
      };
    }
  },
  computed: {
    ...mapState('vote', ['votes']),
    userHasNotUserPower() {
      return !this.dataForPowerType.user_has_user_power;
    }
  },
  created() {
    this.checkHasPowerTypeVoteAction();
    this.getVotesAction();
  }
};
</script>

<style lang="scss" scoped>
@include dashboard-team-home-contents;

.votes {
  .votes-title {
    display: flex;
    align-items: center;

    .loading-votes-actions {
      width: 180px;
      margin-left: auto;
    }

    .vote-actions {
      margin-left: auto;
      display: flex;

      .btn {
        font-weight: 500;
        cursor: pointer;
        padding: 5px 12px;
        font-size: 13px;
        border-radius: 30px;
        transition: .3s;
        margin-left: 14px;

        &.create-power-vote {
          background-color: $df-blue-color;
          color: white;

          &:hover {
            background-color: $df-blue-color-hover-light;
          }
        }

        &.create-vote {
          @include center-lg-green-box-shadow;
          background-color: $df-green-color;
          color: white;
          position: relative;

          i {
            margin-right: 3px;
          }

          &:hover {
            background-color: $df-light-green-color;
          }

          &.disable {
            background-color: $df-light-black;
            color: #8C8C8C;
            box-shadow: 0 0 0 0;
            pointer-events: none;

            .power-vote-info {
              display: flex;
              align-items: center;
              justify-content: center;
            }
          }

          .power-vote-info {
            background-color: $df-warning-yellow-bg-color;
            color: $df-warning-yellow-color;
            border: 1px solid #fff2d7;;
            position: absolute;
            top: 33px;
            left: 0;
            font-size: 9px;
            padding: 4px;
            width: 100%;
            border-radius: 20px;
            font-weight: 300;
            display: none;
          }
        }

        &.finished-votes-btn {
          color: $df-black-and-blue-color;
          background-color: #e8ebef;

          &:hover {
            background-color: #edf0f3;
          }
        }
      }
    }
  }

  .list-container {
    width: 100%;
    overflow: auto;

    &::-webkit-scrollbar {
      width: 5px;
    }

    .votes-type-list {
      min-height: 45%;

      .list {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;

        .no-data {
          display: flex;
          flex-direction: column;
          align-items: center;
          width: 100%;
          margin-top: 40px;

          img {
            width: 70px;
          }

          .text {
            font-weight: 300;
            font-size: 14px;
            color: #c5c5c5;
            margin-top: 15px;
          }
        }

        .item-container {
          display: flex;
          justify-content: center;
          width: 25%;
          margin: 15px 0;

          &:nth-child(4n+1) {
            //!important ?
            justify-content: flex-start;
          }

          &:nth-child(4n) {
            justify-content: flex-end;
          }

          .item {
            min-width: 135px;
            cursor: pointer;
            border-radius: 5px;
            transition: .2s;


            .top {
              background-color: white;
              display: flex;
              flex-direction: column;
              align-items: center;
              padding: 15px 7px;
              border: 1px solid #eeeeee;
              border-bottom: 0;
              border-radius: 5px 5px 0 0;
              transition: .3s;

              .icon {
                img {
                  width: 45px;
                }
              }

              .vote-name {
                width: 100%;
                height: 100%;
                font-size: 13px;
                text-overflow: ellipsis;
                white-space: nowrap;
                overflow: hidden;
                text-align: center;
              }
            }

            .bottom-info {
              padding: 3px;
              text-align: center;
              width: 100%;
              font-size: 12px;
              border-radius: 0 0 5px 5px;

              &.voted-info {
                display: none;
              }
            }
          }
        }
      }
    }

    .active-votes {
      .list .item-container .item {
        &:hover .top {
          background-color: #f2f6ff;
          border-color: $df-blue-color;
        }

        &.voted {
          cursor: default;
          pointer-events: none;

          .top {
            background-color: #f5fffb;
            border-color: $df-green-color;

            .vote-name {
              color: #838d94;
            }
          }

          .bottom-info {
            background-color: $df-green-color;

            &.time {
              display: none;
            }

            &.voted-info {
              display: block;
            }
          }
        }

        &.everyone-voted {
          .top .voted-percentage {
            background-color: $df-green-color;
            color: white;
          }
        }

        &.user-has-not-user-power {
          pointer-events: none;
          filter: grayscale(100%);
        }

        .top {
          position: relative;

          .voted-percentage {
            font-size: 10px;
            position: absolute;
            left: 4px;
            top: 4px;
            color: $df-mdl-dark-black-color;
            background-color: #eeeeee;
            padding: 2px 5px;
            border-radius: 20px;
          }

          .vote-name {
            color: $df-blue-color;
          }
        }

        .bottom-info {
          background-color: $df-blue-color;
          color: white;
        }
      }
    }

    .next-votes {
      margin-top: 25px;

      .content-title {
        display: flex;

        .next-vote-info {
          margin-left: 10px;
        }
      }

      .list {
        .item-container {
          .item {
            cursor: default;

            &:hover .top {
              border-color: #dadada;
              background-color: #f8f8f8;
            }

            .top {
              .vote-name {
                color: $df-mdl-dark-black-color;
              }
            }

            .bottom-info {
              color: $df-mdl-dark-black-color;
              background-color: #dadada;
            }
          }
        }
      }
    }
  }
}

// Responsive Votes List
@media only screen and (max-width: 1100px) {
  .votes .list-container .votes-type-list .list .item-container {
    width: 50% !important;

    &:nth-child(2n+1) {
      justify-content: flex-start !important;
    }

    &:nth-child(2n+2) {
      justify-content: flex-end !important;
    }
  }
}

// Responsive Votes List
@media only screen and (max-width: 1450px) {
  .votes .list-container .votes-type-list .list .item-container {
    width: 33%;

    &:nth-child(3n+1) {
      justify-content: flex-start;
    }

    &:nth-child(3n+3) {
      justify-content: flex-end;
    }

    &:nth-child(3n+2) {
      justify-content: center;
    }
  }
}
</style>
