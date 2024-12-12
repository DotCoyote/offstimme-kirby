import { onMounted, reactive, ref } from 'vue';
import { Language } from '../../voices/typings/language.types';
import { useVoiceActorLanguages } from './useVoiceActorLanguages';
import { SelectedFilters } from '../../voices/typings/filterForm.types';

export const languageOptionsLoading = ref(false);
export const languageOptions = ref<Language[]>([]);

export function useVoiceFilterOptions() {
  const selectedFilters = reactive<SelectedFilters>({
    voiceAge: null,
    voiceStyle: null,
    gender: null,
    language: null,
    searchText: '',
  });

  const voiceAgeOptions = [
    {
      label: 'Adult',
      value: 'adult',
    },
    {
      label: 'Mature',
      value: 'mature',
    },
    {
      label: 'Young Adult',
      value: 'youngAdult',
    },
  ];

  const voiceStyleOptions = [
    {
      label: 'Deep',
      value: 'deep',
    },
    {
      label: 'Middle',
      value: 'middle',
    },
    {
      label: 'Light',
      value: 'light',
    },
  ];

  const genderOptions = [
    {
      label: 'Female',
      value: 'female',
    },
    {
      label: 'Male',
      value: 'male',
    },
    {
      label: 'Diverse',
      value: 'diverse',
    },
  ];

  async function requestLanguages() {
    const { fetchVoiceActorLanguages } = useVoiceActorLanguages();
    if (!languageOptions.value.length && !languageOptionsLoading.value) {
      try {
        languageOptionsLoading.value = true;
        languageOptions.value = await fetchVoiceActorLanguages();
      } finally {
        languageOptionsLoading.value = false;
      }
    }
  }

  function mapUrlParams() {
    const url = new URL(window.location.href);
    const voiceGender = url.searchParams.get('voiceGender') || url.searchParams.get('gender');

    if (voiceGender && voiceGender !== '-') {
      selectedFilters.gender = voiceGender;
    }
    const voiceLanguage = url.searchParams.get('voiceLanguage') || url.searchParams.get('language');
    if (voiceLanguage && voiceLanguage !== '-') {
      selectedFilters.language = voiceLanguage;
    }
    const voiceAge = url.searchParams.get('voiceAge');
    if (voiceAge && voiceAge !== '-') {
      selectedFilters.voiceAge = voiceAge;
    }
    const voiceStyle = url.searchParams.get('voiceStyle');
    if (voiceStyle && voiceStyle !== '-') {
      selectedFilters.voiceStyle = voiceStyle;
    }
    const gender = url.searchParams.get('gender');
    if (gender && gender !== '-') {
      selectedFilters.gender = gender;
    }
    const searchText = url.searchParams.get('searchText');
    if (searchText && searchText !== '-') {
      selectedFilters.searchText = searchText;
    }
  }

  onMounted(() => {
    requestLanguages();
  });

  return {
    genderOptions,
    voiceAgeOptions,
    voiceStyleOptions,
    selectedFilters,
    mapUrlParams,
  };
}
