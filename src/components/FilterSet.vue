<script setup>
import { Search } from "@element-plus/icons-vue";

let main = {
   'currentPage': 1,
   'maxPage': 10,
}
</script>

<template>
   <div style="border-bottom: thin solid #e5e5e5;">
      <el-row :gutter="10">
         <el-col :xs="2" :sm="2" :md="3" :lg="3" :xl="3">
            <div class="grid-content bg-purple">
               <el-input placeholder="Search">
               <!-- <el-input v-model="searchTerm" placeholder="Search"> -->
                  <template #prefix> <!-- passing slot -->
                     <el-icon class="el-input__icon">
                        <search />
                     </el-icon>
                  </template>
               </el-input>
            </div>
         </el-col>

         <el-col
            :xs="2"
            :sm="2"
            :md="3"
            :lg="3"
            :xl="3"
            v-for="(filter, index) in filterSets"
            :key="index"
         >
         <div class="grid-content bg-purple">
            <el-select filterable :placeholder="upperFirst(filter)" v-model="searchFilters[filter]">
               <el-option value>None</el-option>
               <el-option v-for="(option, index) in selects[filter]" :key="index" :value="option" />
            </el-select>
         </div>
         </el-col>
      </el-row>

      <el-row style="left: -0.66%;">
         <el-col :xs="2" :sm="2" :md="2" :lg="3" :xl="3">
            <el-pagination
               small
               layout="prev, ->, pager, ->, next"
               :current-page="main.currentPage"
               :page-count="main.maxPage"
               :pager-count="5"
               @current-change="(arg) => main.currentPage = arg"
            ></el-pagination>
         </el-col>
      </el-row>
   </div>
</template>
