{% if article.metafields.custom.quick_summary != blank %}
 {{ article.metafields.custom.quick_summary | metafield_tag }}  
{% endif %}




{% if article.metafields.custom.ss_quick_summary != blank %}
  <div class="ss-summary">
    {{ article.metafields.custom.ss_quick_summary | metafield_tag }}
  </div>
{% endif %}