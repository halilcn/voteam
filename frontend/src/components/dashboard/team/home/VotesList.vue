<template>
  <!-- TODO: UTC ! -->
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
      <div class="active-votes">
        <div class="content-title">
          Aktif Oylamalar
        </div>
        <div class="list">
          {{ $dayjs().add(-3, 'hours') }}
          <!-- <div class="no-data">
            <img src="../../../../assets/icons/no-double-type-vote.png"/>
            <div class="text">
              Aktif oylama hiç yok
            </div>
          </div>-->
          <div v-for="(vote,index) in votes.active"
               :key="index"
               :class="{voted:vote.is_voted,'everyone-voted':vote.voted_percentage === 100}"
               class="item">
            <div class="top">
              <div class="voted-percentage">
                %{{ vote.voted_percentage }}
              </div>
              <div class="icon">
                <img :src="require(`../../../../assets/icons/${vote.type}-type-vote.png`)" alt="power-vote"/>
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
          <!--           <div class="item voted">
            <div class="top">
              <div class="voted-percentage">
                %56
              </div>
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaasdsad sadas
              </div>
            </div>
            <div class="time">
              <i class="bi bi-check-all"></i>
              Oy Verilmiş !
            </div>
          </div>
-->
          <!--  <div class="item voted everyone-voted">
             <div class="top">
               <div class="voted-percentage">
                 %100
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
               </div>
               <div class="vote-name">
                 Güç Oylaması
               </div>
             </div>
             <div class="time">
               <i class="bi bi-check-all"></i>
               Oy Verilmiş !
             </div>
           </div>
           <div class="item voted">
             <div class="top">
               <div class="voted-percentage">
                 %21
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/leader-type-vote.png" alt="power-vote"/>
               </div>
               <div class="vote-name">
                 Lider Oylaması
               </div>
             </div>
             <div class="time">
               <i class="bi bi-check-all"></i>
               Oy Verilmiş !
             </div>
           </div>
           <div class="item ">
             <div class="top">
               <div class="voted-percentage">
                 %75
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
               </div>
               <div class="vote-name">
                 Güç Oylaması
               </div>
             </div>
             <div class="time">
               <i class="bi bi-check-all"></i>
               Oy Verilmiş !
             </div>
           </div>
           <div class="item">
             <div class="top">
               <div class="voted-percentage">
                 %56
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/multiple-type-vote.png" alt="power-vote"/>
               </div>
               <div class="vote-name">
                 bu bir test oylama başlığıdır
               </div>
             </div>
             <div class="time">
               <i class="bi bi-stopwatch-fill"></i>
               1 gün 12 saat
             </div>
           </div>
           <div class="item">
             <div class="top">
               <div class="voted-percentage">
                 %56
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/multiple-type-vote.png" alt="power-vote"/>
               </div>
               <div class="vote-name">
                 kabul re oylamasıdır bu
               </div>
             </div>
             <div class="time">
               <i class="bi bi-stopwatch-fill"></i>
               1 gün 12 saat
             </div>
           </div>-->
          <!--  <div class="item">
             <div class="top">
               <div class="voted-percentage">
                 %56
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/classic-double-type-vote.png" alt="classic-vote"/>
               </div>
               <div class="vote-name">
                 Bu bir örnek klasik oylama yazısıdır.
               </div>
             </div>
             <div class="time">
               <i class="bi bi-stopwatch-fill"></i>
               1 gün 12 saat
             </div>
           </div>
           <div class="item voted">
             <div class="top">
               <div class="voted-percentage">
                 %56
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/power-double-type-vote.png" alt="power-vote"/>
               </div>
               <div class="vote-name">
                 Güç Oylaması
               </div>
             </div>
             <div class="time">
               Oy Verilmiş !
             </div>
           </div>
           <div class="item">
             <div class="top">
               <div class="voted-percentage">
                 %56
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/classic-double-type-vote.png" alt="classic-vote"/>
               </div>
               <div class="vote-name">
                 Bu bir örnek klasik oylama yazısıdır.
               </div>
             </div>
             <div class="time">
               <i class="bi bi-stopwatch-fill"></i>
               1 gün 12 saat
             </div>
           </div>
           <div class="item">
             <div class="top">
               <div class="voted-percentage">
                 %56
               </div>
               <div class="icon">
                 <img src="../../../../assets/icons/classic-double-type-vote.png" alt="classic-vote"/>
               </div>
               <div class="vote-name">
                 Para Paylaşımı
               </div>
             </div>
             <div class="time">
               <i class="bi bi-stopwatch-fill"></i>
               1 gün 12 saat
             </div>
           </div>-->
        </div>
      </div>
      <div class="next-votes">
        <div class="content-title">
          Gelecek Oylamalar
          <info-tooltip text="Güç Oylaması ve Lider Oylaması belirli günlerde otomatik yapılır."
                        class="next-vote-info"/>
        </div>
        <div class="list">
          <!-- <div class="no-data">
            <img src="../../../../assets/icons/no-double-type-vote.png"/>
            <div class="text">
              Gelecek oylama hiç yok
            </div>
          </div>-->
          <div class="item">
            <div class="top">
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaması
              </div>
            </div>
            <div class="time">
              <i class="bi bi-clock-fill"></i>
              12 Haziran
            </div>
          </div>
          <div class="item">
            <div class="top">
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaması
              </div>
            </div>
            <div class="time">
              <i class="bi bi-clock-fill"></i>
              12 Haziran
            </div>
          </div>
          <div class="item">
            <div class="top">
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaması
              </div>
            </div>
            <div class="time">
              <i class="bi bi-clock-fill"></i>
              12 Haziran
            </div>
          </div>
          <div class="item">
            <div class="top">
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaması
              </div>
            </div>
            <div class="time">
              <i class="bi bi-clock-fill"></i>
              12 Haziran
            </div>
          </div>
          <div class="item">
            <div class="top">
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaması
              </div>
            </div>
            <div class="time">
              <i class="bi bi-clock-fill"></i>
              12 Haziran
            </div>
          </div>
          <div class="item">
            <div class="top">
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaması
              </div>
            </div>
            <div class="time">
              <i class="bi bi-clock-fill"></i>
              12 Haziran
            </div>
          </div>
          <div class="item">
            <div class="top">
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaması
              </div>
            </div>
            <div class="time">
              <i class="bi bi-clock-fill"></i>
              12 Haziran
            </div>
          </div>
          <div class="item">
            <div class="top">
              <div class="icon">
                <img src="../../../../assets/icons/power-vote.png" alt="power-vote"/>
              </div>
              <div class="vote-name">
                Güç Oylaması
              </div>
            </div>
            <div class="time">
              <i class="bi bi-clock-fill"></i>
              12 Haziran
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CreateVotePopup from './CreateVote/CreateVotePopup';
import InfoTooltip from '../../../shared/InfoTooltip';
import { mapActions, mapState } from 'vuex';

export default {
  name: 'VotesList',
  data() {
    return {
      isEnableCreateVotePopup: false
    };
  },
  components: {
    CreateVotePopup,
    InfoTooltip
  },
  methods: {
    ...mapActions('vote', ['getVotes']),
    toggleCreateVotePopup() {
      this.isEnableCreateVotePopup = !this.isEnableCreateVotePopup;
    }
  },
  computed: {
    ...mapState('vote', ['votes'])
  },
  created() {
    this.getVotes();
  }
};
</script>

<style lang="scss" scoped>
@include dashboard-team-home-contents;

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

    > div {
      overflow: hidden;

      .list {
        //  overflow: auto;
        height: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 30px;

        .no-data {
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
            color: #898989;
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
