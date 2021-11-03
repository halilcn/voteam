<template>
  <!-- TODO: CSS ! yanlışlar çok ? -->
  <create-vote-popup
      @handlePopup="toggleCreateVotePopup"
      :is-enable="isEnableCreateVotePopup"/>

  <div class="home-content votes">
    <div class="title votes-title">
      <div class="txt">
        <i class="bi bi-archive"></i>
        Oylamalar
      </div>
      <div @click="toggleCreateVotePopup" class="create-vote">
        <i class="bi bi-plus-circle-fill"></i>
        Oylama Başlat
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
                   :class="{voted:vote.is_voted,'everyone-voted':vote.voted_percentage === 100}"
                   class="item">
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
                  {{ $dayjs($helpers.convertTimeToUtc(vote.end_date)).fromNow() }}
                </div>
                <div class="bottom-info voted-info">
                  <i class="bi bi-check-all"></i>
                  Oy Verilmiş !
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
                  class="item">
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
                  {{ $dayjs(vote.end_date).format('D MMMM') }}
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
import CreateVotePopup from './CreateVote/CreateVotePopup';
import InfoTooltip from '../../../shared/InfoTooltip';
import LoadingAnimation from '../../../shared/LoadingAnimation';
import { mapActions, mapState } from 'vuex';

export default {
  name: 'VotesList',
  data() {
    return {
      isEnableCreateVotePopup: false,
      isLoading: {
        votes: true,
        teamInfo: false
      }
    };
  },
  components: {
    CreateVotePopup,
    InfoTooltip,
    LoadingAnimation
  },
  methods: {
    ...mapActions('vote', ['getVotes']),
    getVotesAction() {
      this.handle(async () => {
        this.isLoading.votes = true;
        await this.getVotes();
      })
          .finally(() => {
            this.isLoading.votes = false;
          });
    },
    toggleCreateVotePopup() {
      this.isEnableCreateVotePopup = !this.isEnableCreateVotePopup;
    }
  },
  computed: {
    ...mapState('vote', ['votes'])
  },
  created() {
    this.getVotesAction();
  }
};
</script>

<style lang="scss" scoped>
@include dashboard-team-home-contents;
//votes list width problem ?

.votes {
  .votes-title {
    display: flex;
    align-items: center;

    .create-vote {
      @include center-lg-green-box-shadow;
      font-weight: 500;
      cursor: pointer;
      padding: 5px 12px;
      font-size: 13px;
      background-color: $df-green-color;
      color: white;
      margin-left: auto;
      border-radius: 30px;
      transition: .3s;

      i {
        margin-right: 3px;
      }

      &:hover {
        background-color: $df-light-green-color;
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
      //overflow: hidden;
      min-height: 45%;

      .list {
        // TODO: Problem
        position: relative;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 30px;

        .no-data {
          margin-top: 30px;
          display: flex;
          flex-direction: column;
          align-items: center;
          width: 100%;

          img {
            width: 70px;
          }

          .text {
            font-weight: 300;
            font-size: 14px;
            color: #c5c5c5; //img color ?
            margin-top: 10px;
          }
        }

        .item {
          width: 130px;
          // min-width: 120px;
          // width: 20%;
          margin: 12px 0;
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

    .active-votes {
      .list {
        .item {
          &:hover .top {
            background-color: #f2f6ff;
            border-color: $df-blue-color;
          }

          &.voted {
            cursor: default;

            .top {
              background-color: #f5fffb;
              border-color: $df-green-color;

              .vote-name {
                color: #888888;
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
            .top {
              .voted-percentage {
                background-color: $df-green-color;
                color: white;

              }
            }
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
              // background-color: $df-green-color;
              // color: white;
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
</style>
