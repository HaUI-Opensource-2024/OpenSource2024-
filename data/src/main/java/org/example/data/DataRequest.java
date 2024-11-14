package org.example.data;

import lombok.*;
import lombok.experimental.FieldDefaults;

import java.util.List;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
@FieldDefaults(level = AccessLevel.PRIVATE)
public class DataRequest {
    private String title;
    private boolean isPro;
    private String description;
    private String prompt;
    List<String> fields;
}
