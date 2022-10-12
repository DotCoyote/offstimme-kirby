export function useVoiceActorLanguages() {
  async function fetchVoiceActorLanguages() {
    const response = await fetch(`/api/pages/languages`, {
      method: 'GET',
      headers: {
        // @ts-ignore
        'x-csrf': window.csrf,
        // @ts-ignore
        'x-language': window.lang,
      },
    });
    if (response.status >= 400 && response.status < 600) {
      throw response.statusText;
    }
    const responseJson = await response.json();
    return responseJson.data.content.languages;
  }

  return {
    fetchVoiceActorLanguages,
  };
}
