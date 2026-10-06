{% if article.metafields.custom.quick_summary != blank %}
 {{ article.metafields.custom.quick_summary | metafield_tag }}  
{% endif %}