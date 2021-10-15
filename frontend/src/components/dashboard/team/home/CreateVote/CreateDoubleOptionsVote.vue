<template>
  <div class="vote-type-title">
    Kabul-Red Oylaması
  </div>
  <vote-title/>
  <div class="form-item">
    <div class="title">
      Ne Oylanacak ?
    </div>
    <div class="content vote-text">
      <textarea class="content-text"/>
    </div>
  </div>
  <vote-start-date/>
  <vote-end-date/>
</template>

<script>
import VoteTitle from './CreateVoteItems/VoteTitle';
import VoteStartDate from './CreateVoteItems/VoteStartDate';
import VoteEndDate from './CreateVoteItems/VoteEndDate';

export default {
  name: 'CreateYesNoVote',
  components: {
    VoteTitle,
    VoteStartDate,
    VoteEndDate
  }
};
</script>

<style lang="scss" scoped>
@include create-vote-popup-form-item;

.form-item {
  .vote-text textarea {
    width: 100%;
    resize: vertical;
    max-height: 200px;
    min-height: 50px;
  }
}

</style>
