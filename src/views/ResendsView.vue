<script setup>

const main = {
   'orders': [
      {
         order: '167470-a',
         source: 'Website',
         courier: 'W24I',
         tracking: 'H00GGA0008267614',
         name: 'Geoff Chim',
         reason: 'Company',
         option: 'Packing Error',
         room: 'Middle',
         picker: 'Benjamin Carrol',
         packer: 'Unknown',
         created: '2022-03-28',
         dor: 'false',
         notes: 'Missing 60 pots. Resend PI:52 PA:0 GA',
      },{
         order: '202-2726031-8844335-a',
         source: 'Amazon',
         courier: 'W24I',
         tracking: 'JD0002219852250515',
         name: 'Anita Dale',
         reason: 'Courier',
         option: 'Arrived Damaged',
         room: 'Fert',
         picker: 'Unknown',
         packer: 'Unknown',
         created: '2022-03-28',
         dor: 'false',
         notes: 'Bucket damaged, resend bucket. GA',
      }
   ]
}
</script>

<template>
   <el-container>
      <el-header height="65px">
         
      </el-header>

      <el-main>
         <el-table
            :data="main.orders"
            style="width: 100%"
            stripe
         >
            <el-table-column prop="order" label="Order" width="200" />
            <el-table-column prop="source" label="Source" width="100" />
            <el-table-column prop="courier" label="Courier" width="75" />
            <el-table-column prop="tracking_id" label="Tracking" width="175" />
            <el-table-column prop="name" label="Name" width="125" show-overflow-tooltip />
            <el-table-column prop="reason" label="Reason" width="150" />
            <el-table-column prop="option" label="Option" width="200" show-overflow-tooltip />
            <el-table-column prop="room" label="Room" width="75" />
            <el-table-column prop="picker" label="Picker" width="150" />
            <el-table-column prop="packer" label="Packer" width="150" />
            <el-table-column prop="created" label="Created" width="100" sortable="custom" />
            <el-table-column prop="dor" label="Dor" width="75" sortable="custom" />
            <el-table-column prop="notes" label="Notes" width="200" show-overflow-tooltip />
         </el-table>
      </el-main>
   </el-container>
</template>

<style scoped>
</style>
