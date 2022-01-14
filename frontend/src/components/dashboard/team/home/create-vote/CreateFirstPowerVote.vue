<template>
  <popup
      :title="$t('popups.firstPowerVote.title')"
      @handleDisable="$emit('handlePopup')"
      :is-enable="isEnable">
    <template v-slot:content>
      <loading-animation v-if="isLoading.powerTypeData"/>
      <div v-else class="create-power-vote-content">
        <warning v-if="!powerTypeVoteData.has_more_than_lower_limit_users"
                 :text="$t('popups.firstPowerVote.content.info.hasMoreThanLowerLimitUsers')"/>
        <success v-if="hasActiveVote"
                 :text="$t('popups.firstPowerVote.content.info.hasActiveVote')"/>
        <template v-if="!hasActiveVote">
          <info class="power-vote-info"
                :text="$t('popups.firstPowerVote.content.info.powerVote')"/>
          <standart-button
              class="create-power-vote"
              :text="$t('popups.firstPowerVote.content.createVote')"
              :is-disable="isDisablePostVoteButton"
              @click="postVoteAction"/>
        </template>
      </div>
    </template>
  </popup>
</template>

<script>
import Popup from '../../../../shared/Popup';
import StandartButton from '../../../../shared/elements/StandartButton';
import Info from '../../../../shared/Info';
import Warning from '../../../../shared/Warning';
import Success from '../../../../shared/Success';
import LoadingAnimation from '../../../../shared/LoadingAnimation';
import constants from '../../../../../store/constants';
import { mapActions } from 'vuex';

export default {
  name: 'CreatePowerVote',
  props: ['isEnable'],
  data() {
    return {
      powerTypeVoteData: {},
      vote: {
        title: this.$t('popups.firstPowerVote.firstPowerVoteText'),
        type: constants.VOTE_TYPES['POWER'],
        options: constants.POWER_VOTE_DEFAULT_OPTIONS,
        start_date: this.$dayjs(),
        end_date: this.$dayjs().add(1, 'day')
      },
      isLoading: {
        powerTypeData: true,
        postVote: false
      }
    };
  },
  watch: {
    isEnable(newValue) {
      if (newValue === true) {
        this.checkForStorePowerTypeVoteAction();
      }
    }
  },
  components: {
    Popup,
    StandartButton,
    Info,
    Warning,
    Success,
    LoadingAnimation
  },
  methods: {
    ...mapActions('vote', ['checkForStorePowerTypeVote', 'postVote']),
    checkForStorePowerTypeVoteAction() {
      this.handle(async () => {
        this.isLoading.powerTypeData = true;
        this.powerTypeVoteData = await this.checkForStorePowerTypeVote();
      })
          .finally(() => {
            this.isLoading.powerTypeData = false;
          });
    },
    postVoteAction() {
      this.handle(async () => {
        this.isLoading.postVote = true;
        await this.postVote(this.vote);
        this.createdVote();
      })
          .finally(() => {
            this.isLoading.postVote = false;
          });
    },
    createdVote() {
      this.$emit('handlePopup');
      this.$notify.success(this.$t('popups.firstPowerVote.startedVote'));
      this.$emit('update:should-get-votes', true);
    }
  },
  computed: {
    hasActiveVote() {
      return this.powerTypeVoteData.has_active_vote;
    },
    isDisablePostVoteButton() {
      return this.isLoading.postVote || !this.powerTypeVoteData.has_more_than_lower_limit_users;
    }
  }
};
</script>

<style lang="scss" scoped>
.create-power-vote-content {
  .power-vote-info {
    margin: 10px 0;
    font-size: 12px;
  }
}
</style>
